<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Constants;
use App\Helpers\JsonResponse;
use App\Helpers\Mapper;
use App\Helpers\Notifications;
use App\Http\Controllers\Controller;
use App\Http\IRepositories\ICourseRepository;
use App\Http\IRepositories\INotificationRepository;
use App\Http\IRepositories\IStudentRepository;
use App\Http\IRepositories\ISurveyAnswerRepository;
use App\Http\IRepositories\ISurveyRepository;
use App\Models\Survey;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class SurveyController extends Controller
{

    protected $courseRepository;
    protected $surveyRepository;
    protected $studentRepository;
    protected $surveyAnswerRepository;
    protected $notificationRepository;
    protected $requestData;


    public function __construct(ICourseRepository $courseRepository,
                                ISurveyRepository $surveyRepository,
                                IStudentRepository $studentRepository,
                                ISurveyAnswerRepository $surveyAnswerRepository,
                                INotificationRepository $notificationRepository)
    {
        $this->courseRepository = $courseRepository;
        $this->surveyRepository = $surveyRepository;
        $this->studentRepository = $studentRepository;
        $this->surveyAnswerRepository = $surveyAnswerRepository;
        $this->notificationRepository = $notificationRepository;
        $this->requestData = Mapper::toUnderScore(Request()->all());
        $this->middleware('permission:Survey');
        $this->middleware('permission:list Survey')->only(['index']);
        $this->middleware('permission:create Survey')->only(['create']);
        $this->middleware('permission:update Survey')->only(['edit']);
        $this->middleware('permission:show students Survey')->only(['surveyStudents']);
        $this->middleware('permission:questions Survey')->only(['surveyQuestions']);
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

            $surveys = $this->surveyRepository->all();

            return view('admin.surveys.list', compact('surveys'));

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

            $courses = $this->courseRepository->all();
            return view('admin.surveys.add', compact('courses'));

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
        //
        try {

            $data = $this->requestData;
            $type = $this->requestData['type'];
            if($type){
                $data['course_id'] = $this->requestData['course'];
            }else{
                $data['course_id'] = null;
            }

            $data['user_id'] = auth("admin")->user()->id;

            $validator = Validator::make($data, $validator_rules = Survey::create_update_rules);

            if ($validator->passes()) {


                $survey = $this->surveyRepository->create($data);

                $fcm_data = [
                    'survey_id' => $survey->id,


                ];
                $fcm_message = Constants::NEW_SURVEY_MSG_AR . $survey->title;
                $fcm_title = Constants::NEW_SURVEY_TITLE_AR;

                $students = $this->studentRepository->getStudentByStatus(1);

                $student_tokens = [];
                foreach ($students as $student) {
                    if ($student->fcm_token != '0') {
                        array_push($student_tokens, $student->fcm_token); // (logged in) just get a valid fcm_token for admin
                    }
                }

                if (!empty($student_tokens)) {
                    $notification = Notifications::addNotification($student_tokens, $fcm_title, $fcm_message, $fcm_data);

                }

                $not_data['type'] = 'new_survey';
                $not_data['fcm_message_en'] = Constants::NEW_SURVEY_MSG_EN . $survey->title;
                $not_data['fcm_title_en'] = Constants::NEW_SURVEY_TITLE_EN;
                $not_data['fcm_message_ar'] = Constants::NEW_SURVEY_MSG_AR . $survey->title;
                $not_data['fcm_title_ar'] = Constants::NEW_SURVEY_TITLE_AR;
                $not_data['fcm_data'] = json_encode($fcm_data);
                $not_data['user_type'] = 'student';
                $not_data['user_id'] = null;


                foreach ($students as $student) {
                    $not_data['student_id'] = $student->id;
                    $this->notificationRepository->create($not_data);
                }

                return redirect()->route('survey.index')->with('message', trans('surveys/surveys.Survey_Added_Successfully'));

            }
            return redirect()->route('survey.create')->with('error', trans('general.Operation_Failed'));

        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect()->route('survey.create')->with('error', $e->getMessage());

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //

        try {

            $courses = $this->courseRepository->all();
            $survey = $this->surveyRepository->find($id);

            return view('admin.surveys.edit', compact('courses','survey' ));

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
        try {

            $data = $this->requestData;
//            $survey = $this->surveyRepository->find($id);
            $type = $data['type'];


            $survey = Survey::where('id', $id)->first();

            $survey->title = $data['title'];
            $survey->desc = $data['desc'];
            $data['user_id'] = $survey->user_id = auth("admin")->user()->id;

            if($type){
                $survey->course_id = $this->requestData['course'];
            }else{
                $survey->course_id = null;
            }


            $validator = Validator::make($data, $validator_rules = Survey::create_update_rules);

            if ($validator->passes()) {


                $user = $survey->save();


                return redirect()->route('survey.index')->with('message', trans('surveys/surveys.Survey_Updated_Successfully'));

            }
            return redirect()->route('survey.edit', $id)->with('error', trans('general.Operation_Failed'));

        } catch (Exception $e) {
            return redirect()->route('survey.edit', $id)->with('error', $e->getMessage());

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //

        try {

            $this->surveyRepository->delete($id);
            return JsonResponse::respondSuccess(trans('common_msg.' . JsonResponse::MSG_DELETED_SUCCESSFULLY));
        } catch (Exception $ex) {
            return JsonResponse::respondError($ex->getMessage());
        }
    }

    public function surveyQuestions($id)
    {
        //
        try {

            $survey = $this->surveyRepository->find($id);
            $questions = $survey->survey_questions;
//            $qtypes = $this->qu
            return view('admin.surveys.questions', compact('survey','questions'));

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function surveyStudents($id)
    {
        //
        try {

            $survey = $this->surveyRepository->find($id);
            $students = $survey->students;

            return view('admin.surveys.students', compact('survey', 'students'));

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function surveyStudentsAnswers($test_id, $stud_id)
    {
        //
        try {

            $survey = $this->surveyRepository->find($test_id);
            $student = $this->studentRepository->find($stud_id);



            return view('admin.surveys.studentAnswers', compact('survey', 'student'));

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }



}
