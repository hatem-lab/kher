<?php


namespace App\Http\Repository;


use App\Http\IRepositories\IStudentCourseRegistrationRequestRepository;
use App\Models\CourseStudent;
use App\Models\CourseUser;
use App\Models\StudentCourseRegistrationRequest;

class StudentCourseRegistrationRequestRepository extends BaseRepository implements IStudentCourseRegistrationRequestRepository
{

    public function model()
    {
        return StudentCourseRegistrationRequest::class;
    }

    public function getSubscriptionsByStatus($status)
    {
        try {

            if(auth('admin')->user()->role == 2 )
            {
                $courses=[];

                $courses_teacher=auth('admin')->user()->courses;

                    foreach($courses_teacher as $one)
                {
                    if( $this->model->where('status', $status)->where('course_id',$one->id)->first())
                    {
                        $courses[] = $this->model
                            ->where('status', $status)
                            ->where('course_id',$one->id)
                            ->pluck('id');
                    }
                }
                $subscriptions = $this->model->whereIn('id', $courses)->get();
            }
            else
            {
                $subscriptions = $this->model->where('status', $status)->orderBy('created_at', 'desc')->get();

            }

            return $subscriptions;
        } catch (\Exception $exception) {
            throw new \Exception('common_msg.' . trans($exception->getMessage()));
        }
    }

    public function getSubscriptionsByIdAndStatus($id,$status)
    {
        try {

            $subscriptions = $this->model->where('course_id', $id)->where('status', $status)->orderBy('created_at', 'desc')->get();
            return $subscriptions;
        } catch (\Exception $exception) {
            throw new \Exception('common_msg.' . trans($exception->getMessage()));
        }
    }

    public function updateSubscriptionsByIdAndStatus($id,$status)
    {
        try {
            $CourseStudentRequest=StudentCourseRegistrationRequest::findOrFail($id);
            $CourseStudentRequest->status = $status;
            if($CourseStudentRequest->save() && $status == 'Accept'){
                $CourseStudent = new CourseStudent();
                $CourseStudent->status = 1;
                $CourseStudent->student_id = $CourseStudentRequest->student_id;
                $CourseStudent->course_id = $CourseStudentRequest->course_id;
                $CourseStudent->save();

            }
            $subscriptions = $this->model->where('course_id', $id)->where('status', 'Pending')->orderBy('created_at', 'desc')->get();
            return $subscriptions;
        } catch (\Exception $exception) {
            throw new \Exception('common_msg.' . trans($exception->getMessage()));
        }
    }


}
