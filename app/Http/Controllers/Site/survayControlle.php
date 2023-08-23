<?php

namespace App\Http\Controllers\Site;

use App\Helpers\Constants;
use App\Helpers\Mapper;
use App\Helpers\Notifications;
use App\Http\Controllers\Controller;
use App\Http\IRepositories\ISurveyAnswerRepository;
use App\Http\IRepositories\ICourseRepository;
use App\Http\IRepositories\INotificationRepository;
use App\Http\IRepositories\IStudentRepository;
use App\Http\IRepositories\ISurveyRepository;
use App\Http\IRepositories\IUserRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class survayControlle extends Controller
{
    //

    protected $courseRepository;
    protected $surveyRepository;
    protected $studentRepository;
    protected $answerRepository;
    protected $notificationRepository;
    protected $userRepository;
    protected $requestData;


    public function __construct(ICourseRepository $courseRepository,
                                ISurveyRepository $surveyRepository,
                                IStudentRepository $studentRepository,
                                ISurveyAnswerRepository $answerRepository,
                                INotificationRepository $notificationRepository,
                                IUserRepository $userRepository)

    {
        $this->courseRepository = $courseRepository;
        $this->surveyRepository = $surveyRepository;
        $this->studentRepository = $studentRepository;
        $this->answerRepository = $answerRepository;
        $this->notificationRepository = $notificationRepository;
        $this->userRepository = $userRepository;
        $this->requestData = Mapper::toUnderScore(Request()->all());
    }


    public function allsurveyForStudent()
    {
        //

        try {

            $student = auth('student')->user();

            $courses_ids = $student->courses->pluck('id');

            $surveys = $this->surveyRepository->getSurveysForStudent($courses_ids);


            return view('user.survay.survays', compact('surveys'));

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    public function survayDetailsForStudent($id){

        try {

            $student = auth('student')->user();

            $survay = $this->surveyRepository->find($id);

            $student_surveys = $student->surveys->pluck('id')->toArray();

//                        dd( in_array(3, $student_surveys));

            return view('user.survay.survay-details', compact(['survay', 'student_surveys']));

        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    public function survayQuestions($id){

        try {

            $student = auth('student')->user();

            $survay = $this->surveyRepository->find($id);

            $questions = $survay->survey_questions;

            return view('user.survay.questions-list', compact('survay', 'questions'));

        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    public function applysurvay($survey_id){

        try {

            $data = $this->requestData;
            $student = auth('student')->user();


            $survay = $this->surveyRepository->find($survey_id);

            $questions = $survay->survey_questions;


            $res = [];
            foreach ($questions as $question){
                $insert_data = []; // clear array
                if(isset($data[$question->id])){
                    $insert_data['survey_question_id'] = $question->id;
                    $insert_data['student_id'] = $student->id;


                    if ($question->questionType->type == 2){ // true false
                        $insert_data['bool'] = $data[$question->id];
                    }elseif ($question->questionType->type == 3 || $question->questionType->type == 4){ // option or multi choice


                        $insert_data['options'] =json_encode($data[$question->id]);
                    }else{
                        $insert_data['desc'] = $data[$question->id];

                    }


                   $answer =  $this->answerRepository->create($insert_data);


                }

            }

//                $student_surveys_data['survey_id']= $survey_id;
//                $student_surveys_data['student_id']= $student->id;

                $student->surveys()->attach($survey_id);


            // todo tested
            $fcm_data = [
                'survey_id' => $survey_id,
                'student_id' => auth('student')->user()->id
            ];
            $fcm_message = Constants::NEW_APPLY_SURVEY_MSG_AR . $survay->title;
            $fcm_title = Constants::NEW_APPLY_SURVEY_TITLE_AR;

            $admins = $this->userRepository->getUsersByRole(1); // admins

            $admins_token = [];
            foreach ($admins as $admin) {
                if ($admin->fcm_token != '0') {
                    array_push($admins_token, $admin->fcm_token); // (logged in) just get a valid fcm_token for admin
                }
            }

            if (!empty($admins_token)) {
                $notification = Notifications::addNotification($admins_token, $fcm_title, $fcm_message, $fcm_data);

            }

            $not_data['type'] = 'apply_survey';
            $not_data['fcm_message_en'] = Constants::NEW_APPLY_SURVEY_MSG_EN . $survay->title;
            $not_data['fcm_title_en'] = Constants::NEW_APPLY_SURVEY_TITLE_EN;
            $not_data['fcm_message_ar'] = Constants::NEW_APPLY_SURVEY_MSG_AR . $survay->title;
            $not_data['fcm_title_ar'] = Constants::NEW_APPLY_SURVEY_TITLE_AR;
            $not_data['fcm_data'] = json_encode($fcm_data);
            $not_data['user_type'] = 'user';
            $not_data['student_id'] = null;


            foreach ($admins as $admin) {
                $not_data['user_id'] = $admin->id;
                $this->notificationRepository->create($not_data);
            }


            return redirect()->route('student.survayD', $survey_id);


        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

}
