<?php


namespace App\Http\Repository;


use App\Helpers\JsonResponse;
use App\Http\IRepositories\INotificationRepository;
use App\Models\FurnitureGallery;
use App\Models\Notification;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\App;

class NotificationRepository extends BaseRepository implements INotificationRepository
{

    public function model()
    {
        return Notification::class;
    }

    public function showNotificationsForUser($user_type, $user_id)
    {
        try {
            if ($user_type == 'user') {
                $id_type = 'user_id';
            } else {
                $id_type = 'student_id';

            }

            $data = $this->model
                ->where([['user_type', $user_type], [$id_type, $user_id]])
                ->orderBy('created_at', 'desc')
                ->get();

            $res = [];
            $local_data = [];
            foreach ($data as $not) {
                $local_data['not_type'] = $not['type'];
                $local_data['id'] = $not['id'];


                if (App::isLocale('en')) {
                    //
                    $local_data['title'] = $not['fcm_title_en'];
                    $local_data['message'] = $not['fcm_message_en'];
                } else {
                    $local_data['title'] = $not['fcm_title_ar'];
                    $local_data['message'] = $not['fcm_message_ar'];

                }

                $local_data['notDate'] = \Carbon\Carbon::parse($not['created_at'])->diffForhumans();

                $fcm_data = json_decode($not['fcm_data']) ? json_decode($not['fcm_data']) : [];

                if (!empty($fcm_data)) {

                    if($user_type == 'user'){

                        switch ($not['type']){

                            case('new_subscription'):

                                $local_data['course_id'] = $fcm_data->course_id;
//                                $local_data['student_id'] = $fcm_data->student_id;
                                $local_data['link'] = route('course.pendinglist');
                                break;
                            case('certificate_request'):

                                $local_data['diploma_id'] = $fcm_data->diploma_id;
                                $local_data['student_id'] = $fcm_data->student_id;
                                $local_data['link'] = route('request.certificate');

                                break;
                            case('student_homework'):

                                $local_data['homework_id'] = $fcm_data->homework_id;
                                $local_data['student_id'] = $fcm_data->student_id;
                                $local_data['link'] = route('homework.students', $fcm_data->homework_id);

                                break;
                            case('apply_survey'):

                                $local_data['survey_id'] = $fcm_data->survey_id;
                                $local_data['student_id'] = $fcm_data->student_id;
                                $local_data['link'] = route('survey.students', $fcm_data->survey_id);

                                break;
                            case('new_comment'):

                                $local_data['blog_id'] = $fcm_data->blog_id;
                                $local_data['student_id'] = $fcm_data->student_id;
                                $local_data['link'] = route('blogs.index');

                                break;

                            case('new_register'):
                                $local_data['student_id'] = $fcm_data->student_id;
                                $local_data['link'] = route('students.pending_registration_request');

                                break;

                            case('apply_test'):
                                $local_data['student_id'] = $fcm_data->student_id;
                                $local_data['test_id'] = $fcm_data->test_id;
                                $local_data['link'] = route('test.students.answers',[$fcm_data->test_id, $fcm_data->student_id] );

                                break;


                            default:
                                $local_data['general'] = null;
                                $local_data['link'] = '#';


                        }

                    }else{

                        switch ($not['type']){

                            case('subscription_status'):
                                $local_data['course_id'] = $fcm_data->course_id;
                                $local_data['subscription_status_code'] = $fcm_data->subscription_status;
                                $local_data['link'] = route('coursedetails', $fcm_data->course_id);

                                break;

                            // TODO $local_data['subscription_status'] = trans($fcm_data->subscription_status);
                            case('test_mark'):
                                $local_data['test_id'] = $fcm_data->test_id;
                                $local_data['mark'] = $fcm_data->mark;
                                $local_data['link'] = route('student.test', $fcm_data->test_id);

                                break;

                            case('new_diploma'):
                                $local_data['diploma_id'] = $fcm_data->diploma_id;
                                $local_data['link'] = route('diplomadetails', $fcm_data->diploma_id);

                                break;

                            case('new_course'):
                                $local_data['course_id'] = $fcm_data->course_id;
                                $local_data['link'] = route('coursedetails', $fcm_data->course_id);

                                break;

                            case('new_lecture'):
                                $local_data['lecture_id'] = $fcm_data->lecture_id;
                                $local_data['link'] = route('lecturedetails', $fcm_data->lecture_id);


                                break;

                            case('new_test'):
                                $local_data['test_id'] = $fcm_data->test_id;
                                $local_data['link'] = route('student.test', $fcm_data->test_id);

                                break;

                            case('new_homework'):
                                $local_data['homework_id'] = $fcm_data->homework_id;
                                $local_data['link'] = route('student.homework', $fcm_data->homework_id);

                                break;

                            case('homework_mark'):

                                $local_data['homework_id'] = $fcm_data->homework_id;
                                $local_data['mark'] = $fcm_data->mark;
                                $local_data['link'] = route('student.homework', $fcm_data->homework_id);

                                break;

                            case('new_survey'):
                                $local_data['survey_id'] = $fcm_data->survey_id;
                                $local_data['link'] = '#'; //TODO

                                break;

                            default:
                                $local_data['general'] = null;
                                $local_data['link'] = '#';

                        }

                    }

                }
                $local_data['not_status'] = $not['status'] ? trans('common_msg.old') : trans('common_msg.new');
                $local_data['not_status_code'] = $not['status'];

                array_push($res, $local_data);
            }

            return $res;
        } catch (\Exception $exception) {
            throw new \Exception('common_msg.' . trans($exception->getMessage()));
        }
    }


    public function getNotificationsForUser($user_type, $user_id)
    {
        try {
            if ($user_type == 'user') {
                $id_type = 'user_id';
            } else {
                $id_type = 'student_id';

            }


            $data = $this->model
                ->where([['user_type', $user_type], [$id_type, $user_id]])
                ->orderBy('created_at', 'desc')
                ->get();


            $res = [];
            $local_data = [];
            foreach ($data as $not) {
                $local_data['not_type'] = $not['type'];
                $local_data['id'] = $not['id'];

                if (App::isLocale('en')) {
                    //
                    $local_data['title'] = $not['fcm_title_en'];
                    $local_data['message'] = $not['fcm_message_en'];
                } else {
                    $local_data['title'] = $not['fcm_title_ar'];
                    $local_data['message'] = $not['fcm_message_ar'];

                }

                $local_data['notDate'] = \Carbon\Carbon::parse($not['created_at'])->diffForhumans();

                $fcm_data = json_decode($not['fcm_data']) ? json_decode($not['fcm_data']) : [];

                if (!empty($fcm_data)) {

                    if($user_type == 'user'){

                        switch ($not['type']){

                            case('new_subscription'):

                                $local_data['course_id'] = $fcm_data->course_id;
//                                $local_data['student_id'] = $fcm_data->student_id;
                                $local_data['link'] = route('course.pendinglist');
                                break;
                            case('certificate_request'):

                                $local_data['diploma_id'] = $fcm_data->diploma_id;
                                $local_data['student_id'] = $fcm_data->student_id;
                                $local_data['link'] = route('request.certificate');

                                break;
                            case('student_homework'):

                                $local_data['homework_id'] = $fcm_data->homework_id;
                                $local_data['student_id'] = $fcm_data->student_id;
                                $local_data['link'] = route('homework.students', $fcm_data->homework_id);

                                break;
                            case('apply_survey'):

                                $local_data['survey_id'] = $fcm_data->survey_id;
                                $local_data['student_id'] = $fcm_data->student_id;
                                $local_data['link'] = route('survey.students', $fcm_data->survey_id);

                                break;
                            case('new_comment'):

                                $local_data['blog_id'] = $fcm_data->blog_id;
                                $local_data['student_id'] = $fcm_data->student_id;
                                $local_data['link'] = route('blogs.index');

                                break;

                            case('new_register'):
                                $local_data['student_id'] = $fcm_data->student_id;
                                $local_data['link'] = route('students.pending_registration_request');

                                break;

                            case('apply_test'):
                                $local_data['student_id'] = $fcm_data->student_id;
                                $local_data['test_id'] = $fcm_data->test_id;
                                $local_data['link'] = route('test.students.answers',[$fcm_data->test_id, $fcm_data->student_id] );

                                break;


                            default:
                                $local_data['general'] = null;
                                $local_data['link'] = '#';


                        }

                    }else{

                        switch ($not['type']){

                            case('subscription_status'):
                                $local_data['course_id'] = $fcm_data->course_id;
                                $local_data['subscription_status_code'] = $fcm_data->subscription_status;
                                $local_data['link'] = route('coursedetails', $fcm_data->course_id);

                                break;

                            // TODO $local_data['subscription_status'] = trans($fcm_data->subscription_status);
                            case('test_mark'):
                                $local_data['test_id'] = $fcm_data->test_id;
                                $local_data['mark'] = $fcm_data->mark;
                                $local_data['link'] = route('student.test', $fcm_data->test_id);

                                break;

                            case('new_diploma'):
                                $local_data['diploma_id'] = $fcm_data->diploma_id;
                                $local_data['link'] = route('diplomadetails', $fcm_data->diploma_id);

                                break;

                            case('new_course'):
                                $local_data['course_id'] = $fcm_data->course_id;
                                $local_data['link'] = route('coursedetails', $fcm_data->course_id);

                                break;

                            case('new_lecture'):
                                $local_data['lecture_id'] = $fcm_data->lecture_id;
                                $local_data['link'] = route('lecturedetails', $fcm_data->lecture_id);


                                break;

                            case('new_test'):
                                $local_data['test_id'] = $fcm_data->test_id;
                                $local_data['link'] = route('student.test', $fcm_data->test_id);

                                break;

                            case('new_homework'):
                                $local_data['homework_id'] = $fcm_data->homework_id;
                                $local_data['link'] = route('student.homework', $fcm_data->homework_id);

                                break;

                            case('homework_mark'):

                                $local_data['homework_id'] = $fcm_data->homework_id;
                                $local_data['mark'] = $fcm_data->mark;
                                $local_data['link'] = route('student.homework', $fcm_data->homework_id);

                                break;

                            case('new_survey'):
                                $local_data['survey_id'] = $fcm_data->survey_id;
                                $local_data['link'] = '#'; //TODO

                                break;

                            default:
                                $local_data['general'] = null;
                                $local_data['link'] = '#';

                        }

                    }

                }
                $local_data['not_status'] = $not['status'] ? trans('common_msg.old') : trans('common_msg.new');
                $local_data['not_status_code'] = $not['status'];

                array_push($res, $local_data);
            }

            return $res;
        } catch (\Exception $exception) {
            throw new \Exception('common_msg.' . trans($exception->getMessage()));
        }
    }


    public function getUnReadNotifications($user_type, $user_id)
    {
        try {

            if ($user_type == 'user') {
                $id_type = 'user_id';
            } else {
                $id_type = 'student_id';

            }

            $data = $this->model
                ->where([['user_type', $user_type], [$id_type, $user_id], ['status', 0]])
                ->get();

            return $data;
        } catch (\Exception $exception) {
            throw new \Exception('common_msg.' . trans($exception->getMessage()));
        }
    }

    public function updateMultiNotifications($data, $nots_ids)
    {
        try {

            $order = $this->model->whereIn('id', $nots_ids)->update($data);

            return $order;
        } catch (\Exception $exception) {
            if ($exception instanceof ModelNotFoundException) {
                throw new \Exception(trans('common_msg.' . JsonResponse::MSG_NOT_FOUND));
            }
            throw new \Exception(trans($exception->getMessage()));
        }
    }

}
