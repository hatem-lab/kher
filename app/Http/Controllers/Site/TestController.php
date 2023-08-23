<?php

namespace App\Http\Controllers\Site;

use App\Helpers\Constants;
use App\Helpers\Mapper;
use App\Helpers\Notifications;
use App\Http\Controllers\Controller;
use App\Http\IRepositories\IAnswerRepository;
use App\Http\IRepositories\ICourseRepository;
use App\Http\IRepositories\INotificationRepository;
use App\Http\IRepositories\IStudentRepository;
use App\Http\IRepositories\ITestRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //

    protected $courseRepository;
    protected $testRepository;
    protected $studentRepository;
    protected $answerRepository;
    protected $notificationRepository;
    protected $requestData;


    public function __construct(ICourseRepository $courseRepository,
                                ITestRepository $testRepository,
                                IStudentRepository $studentRepository,
                                IAnswerRepository $answerRepository,
                                INotificationRepository $notificationRepository)

    {
        $this->courseRepository = $courseRepository;
        $this->testRepository = $testRepository;
        $this->studentRepository = $studentRepository;
        $this->answerRepository = $answerRepository;
        $this->notificationRepository = $notificationRepository;
        $this->requestData = Mapper::toUnderScore(Request()->all());
    }


    public function allTestsForStudent()
    {
        //

        try {

            $student = auth('student')->user();

            $courses = $student->courses;

            $tests = [];
            foreach ($courses as $course){
                $course_tests = $course->tests;
                foreach ($course_tests as $test) {
                    $done_status = in_array($test->id, $student->tests->pluck('id')->toArray());
                    $test_date = Carbon::parse($test->date);
                    $endTime = $test_date->addMinutes($test->duration);

                    if($done_status){
                        $test['done_status'] = trans('tests/tests.completed');
                        $test['done_status_code'] = 1;

                    }else{
                        if( now()->between($test->date, $endTime)  ){
                            $test['done_status'] = trans('tests/tests.in_progress');
                            $test['done_status_code'] = 3;
                        }elseif( now() > $test->date  ){
                            $test['done_status'] = trans('tests/tests.not_completed');
                            $test['done_status_code'] = 0;
                        }else{
                            $test['done_status'] = trans('tests/tests.up_coming');
                            $test['done_status_code'] = 2;

                        }
                    }

                    array_push($tests, $test);
                }
            }

            return view('user.test.tests', compact('tests'));

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    public function testDetailsForStudent($id){

        try {

            $student = auth('student')->user();

            $test = $this->testRepository->find($id);
            $done_status = $test->students()->where('student_id', $student->id)->first();

            if($done_status){
                $test['done_status'] = trans('tests/tests.completed');
                $test['done_status_code'] = 1;
                $test['total_mark'] = $test->students()->where('student_id', $student->id)->first()->pivot->total_mark;

            }else{
                $test_date = Carbon::parse($test->date);
                $endTime = $test_date->addMinutes($test->duration);
                if( now()->between($test->date, $endTime)  ){
                    $test['done_status'] = trans('tests/tests.in_progress');
                    $test['done_status_code'] = 3;
                    $test['total_mark'] = null;
                }elseif( now() > $test->date  ){
                    $test['done_status'] = trans('tests/tests.not_completed');
                    $test['done_status_code'] = 0;
                    $test['total_mark'] = null;
                }else{
                    $test['done_status'] = trans('tests/tests.up_coming');
                    $test['done_status_code'] = 2;
                    $test['total_mark'] = null;

                }
            }


            return view('user.test.test-details', compact('test'));

        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    public function testQuestions($id){

        try {

            $student = auth('student')->user();

            $test = $this->testRepository->find($id);

            $questions = $test->questions;


            return view('user.test.questions-list', compact('test', 'questions'));

        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    public function applyTest($test_id){

        try {

            $data = $this->requestData;
            $student = auth('student')->user();



            $test = $this->testRepository->find($test_id);

            $questions = $test->questions;


            $res = [];
            foreach ($questions as $question){
                $insert_data = []; // clear array
                if(isset($data[$question->id])){
                    $insert_data['question_id'] = $question->id;
                    $insert_data['student_id'] = $student->id;


                    if ($question->questionType->type == 2){ // true false
                        $insert_data['bool'] = $data[$question->id];
                    }elseif ($question->questionType->type == 3 || $question->questionType->type == 4){ // option or multi choice


                        $insert_data['options'] =json_encode($data[$question->id]);
                    }else{ // text
                        $insert_data['desc'] = $data[$question->id];

                    }


                   $answer =  $this->answerRepository->create($insert_data);


                }

            }


            $test->students()->attach($student->id);

            // todo test not
            $fcm_data = [
                'student_id' => auth('student')->user()->id,
                'test_id' => $test_id
            ];
            $fcm_message = Constants::NEW_APPLY_TEST_MSG_AR . $test->title;
            $fcm_title = Constants::NEW_APPLY_TEST_TITLE_AR;

            $admins = $test->course->users()->get(); // teachers

            $admins_token = [];
            foreach ($admins as $admin) {
                if ($admin->fcm_token != '0') {
                    array_push($admins_token, $admin->fcm_token); // (logged in) just get a valid fcm_token for admin
                }
            }

            if (!empty($admins_token)) {
                $notification = Notifications::addNotification($admins_token, $fcm_title, $fcm_message, $fcm_data);

            }

            $not_data['type'] = 'apply_test';
            $not_data['fcm_message_en'] = Constants::NEW_APPLY_TEST_MSG_EN . $test->title;
            $not_data['fcm_title_en'] = Constants::NEW_APPLY_TEST_TITLE_EN;
            $not_data['fcm_message_ar'] = Constants::NEW_APPLY_TEST_MSG_AR . $test->title;
            $not_data['fcm_title_ar'] = Constants::NEW_APPLY_TEST_TITLE_AR;
            $not_data['fcm_data'] = json_encode($fcm_data);
            $not_data['user_type'] = 'user';
            $not_data['student_id'] = null;


            foreach ($admins as $admin) {
                $not_data['user_id'] = $admin->id;
                $this->notificationRepository->create($not_data);
            }




            return redirect()->route('student.test', $test_id)->with('message', trans('tests/tests.test_apply_successfully'));

        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

}
