<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Constants;
use App\Helpers\JsonResponse;
use App\Helpers\Mapper;
use App\Helpers\Notifications;
use App\Http\Controllers\Controller;
use App\Http\IRepositories\IAnswerRepository;
use App\Http\IRepositories\ICourseRepository;
use App\Http\IRepositories\INotificationRepository;
use App\Http\IRepositories\IStudentRepository;
use App\Http\IRepositories\ITestRepository;
use App\Models\Course;
use App\Models\Schedule;
use App\Models\Test;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TestController extends Controller
{
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
         $this->middleware('permission:Tests');
        $this->middleware('permission:list Test')->only(['index']);
        $this->middleware('permission:create Test')->only(['create']);
        $this->middleware('permission:update Test')->only(['edit']);
        $this->middleware('permission:delete Test')->only(['destroy']);
        $this->middleware('permission:manage Test question')->only(['testQuestions']);
        $this->middleware('permission:students Test')->only(['testStudents']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //

        try {

            if(auth('admin')->user()->role == 2 ){
                $tests= auth('admin')->user()->tests;
                // $courses = auth('admin')->user()->homeworks;//$this->courseRepository->all();
            }
            else {
                $tests = $this->testRepository->all();
            }

            return view('admin.tests.list', compact('tests'));

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        try {

            if(auth('admin')->user()->role == 2 ){
                $courses = auth('admin')->user()->courses;
            }else{
                $courses = $this->courseRepository->all();

            }
            return view('admin.tests.add', compact('courses'));

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {


        try {

            $data = $this->requestData;

            $data['course_id'] = $this->requestData['course'];
            $data['user_id'] = auth("admin")->user()->id;
            if ($data['course_id']) {

                $course = Course::where('id', $data['course_id'])->first();

                $students_course = $course->students;

                $schedule = [];
                $start_date = $this->requestData['date'];

                $end_date = $this->requestData['duration'];

                $end_date = Carbon::createFromFormat('Y-m-d H:i', $start_date)->addMinute($end_date);

                foreach ($students_course as $student) {
                    if ($student->schedules) {
                        $schedule[] = Schedule::where('student_id', $student->id)
                            ->whereBetween('start_date', [$request->date, date($end_date)])
                            ->whereBetween('end_date', [$request->date, date($end_date)])
                            ->first();

                    }
                }
                foreach ($schedule as $one) {
                    if ($one !== null) {
                        return view('admin.lectures.error', compact('schedule'));
                    }
                }
            }


            $validator = Validator::make($data, $validator_rules = Test::create_update_rules);

            if ($validator->passes()) {


                $test = $this->testRepository->create($data);


                $fcm_data = [
                    'test_id' => $test->id,


                ];
                $fcm_message = Constants::NEW_TEST_MSG_AR . $test->title;
                $fcm_title = Constants::NEW_TEST_TITLE_AR;

                $students = $test->course->students;

                $student_tokens = [];
                foreach ($students as $student) {
                    if ($student->fcm_token != '0') {
                        array_push($student_tokens, $student->fcm_token); // (logged in) just get a valid fcm_token for admin
                    }
                }

                if (!empty($student_tokens)) {
                    $notification = Notifications::addNotification($student_tokens, $fcm_title, $fcm_message, $fcm_data);

                }

                $not_data['type'] = 'new_test';
                $not_data['fcm_message_en'] = Constants::NEW_TEST_MSG_EN . $test->title;
                $not_data['fcm_title_en'] = Constants::NEW_TEST_TITLE_EN;
                $not_data['fcm_message_ar'] = Constants::NEW_TEST_MSG_AR . $test->title;
                $not_data['fcm_title_ar'] = Constants::NEW_TEST_TITLE_AR;
                $not_data['fcm_data'] = json_encode($fcm_data);
                $not_data['user_type'] = 'student';
                $not_data['user_id'] = null;


                foreach ($students as $student) {
                    $not_data['student_id'] = $student->id;
                    $this->notificationRepository->create($not_data);
                }


                return redirect()->route('test.index')->with('message', trans('tests/tests.Test_Added_Successfully'));

            }
            return redirect()->route('test.create')->with('error', trans('general.Operation_Failed'));

        } catch (Exception $e) {

            return redirect()->route('test.create')->with('error', $e->getMessage());

        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
        try {

            if(auth('admin')->user()->role == 2 ){
                $courses = auth('admin')->user()->courses;
            }else{
                $courses = $this->courseRepository->all();

            }

            $test = $this->testRepository->find($id);

            return view('admin.tests.edit', compact('courses', 'test'));

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
        try {

            $data = $this->requestData;
            $test = $this->testRepository->find($id);

            $data['course_id'] = $this->requestData['course'];
            $data['user_id'] = $test->user_id;

//            dd($data);
            $validator = Validator::make($data, $validator_rules = Test::create_update_rules);

            if ($validator->passes()) {


                $user = $this->testRepository->update($data, $id);


                return redirect()->route('test.index')->with('message', trans('tests/tests.Test_Updated_Successfully'));

            }
            return redirect()->route('test.edit', $id)->with('error', trans('general.Operation_Failed'));

        } catch (Exception $e) {
            return redirect()->route('test.edit', $id)->with('error', $e->getMessage());

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //

        try {

            $this->testRepository->delete($id);
            return JsonResponse::respondSuccess(trans('common_msg.' . JsonResponse::MSG_DELETED_SUCCESSFULLY));
        } catch (Exception $ex) {
            return JsonResponse::respondError($ex->getMessage());
        }
    }

    public function testQuestions($id)
    {
        //
        try {

            $test = $this->testRepository->find($id);
            $questions = $test->questions;
//            $qtypes = $this->qu
            return view('admin.tests.questions', compact('test', 'questions'));

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public function testStudents($id)
    {
        //
        try {

            $test = $this->testRepository->find($id);
            $students = $test->students;

            return view('admin.tests.students', compact('test', 'students'));

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function testStudentsAnswers($test_id, $stud_id)
    {
        //
        try {

            $test = $this->testRepository->find($test_id);
            $student = $this->studentRepository->find($stud_id);


            return view('admin.tests.studentAnswers', compact('test', 'student'));

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function correctStudentsAnswers($test_id, $stud_id)
    {
        //
        try {

            $answers_ids = $this->requestData; // key => val, answer_id => mark
            $test = $this->testRepository->find($test_id);

            $questions = $test->questions;

            $total_mark = 0;
            foreach ($questions as $question) {
                $student_answer_id = $question->student_answer($stud_id)->id; // get the answer of this question for this student

                $total_mark = $total_mark + $answers_ids[$student_answer_id];

                $data_answer['mark'] = $answers_ids[$student_answer_id];
                $this->answerRepository->update($data_answer, $student_answer_id);
            }
            $updated_test = $test->students()->updateExistingPivot($stud_id, ['total_mark' => $total_mark]);

            if ($updated_test) {

                $fcm_data = [
                    'test_id' => $test_id,
                    'mark' => $total_mark,


                ];
                $fcm_message = Constants::NEW_TEST_MARK_MSG_AR . $test->title;
                $fcm_title = Constants::NEW_TEST_MARK_TITLE_AR;

                $student = $this->studentRepository->find($stud_id);


                if ($student->fcm_token != '0') {
                    $notification = Notifications::addNotification($student->fcm_token, $fcm_title, $fcm_message, $fcm_data);
                }


                $not_data['type'] = 'test_mark';
                $not_data['fcm_message_en'] = Constants::NEW_TEST_MARK_MSG_EN . $test->title;
                $not_data['fcm_title_en'] = Constants::NEW_TEST_MARK_TITLE_EN;
                $not_data['fcm_message_ar'] = Constants::NEW_TEST_MARK_MSG_AR . $test->title;
                $not_data['fcm_title_ar'] = Constants::NEW_TEST_MARK_TITLE_AR;
                $not_data['fcm_data'] = json_encode($fcm_data);
                $not_data['user_type'] = 'student';
                $not_data['user_id'] = null;


                $not_data['student_id'] = $stud_id;
                $this->notificationRepository->create($not_data);


                return redirect()->route('test.students', $test_id)->with('message', trans('tests/tests.Mark_Updated_Successfully'));

            } else {
                return redirect()->route('test.students.answers', [$test_id, $stud_id])->with('error', trans('tests/tests.Mark_NOT_Updated_Successfully'));

            }

        } catch (Exception $e) {
            return redirect()->route('test.students.answers', [$test_id, $stud_id])->with('error', $e->getMessage());

        }
    }

}
