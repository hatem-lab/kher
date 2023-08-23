<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Constants;
use App\Helpers\JsonResponse;
use App\Helpers\Mapper;
use App\Helpers\Notifications;
use App\Http\Controllers\Controller;
use App\Http\IRepositories\ICourseRepository;
use App\Http\IRepositories\IDiplomaRepository;
use App\Http\IRepositories\INotificationRepository;
use App\Http\IRepositories\IStudentRepository;
use App\Http\IRepositories\IUserRepository;
use App\Http\IRepositories\IStudentCourseRegistrationRequestRepository;
use App\Models\Course;
use App\Models\StudentCourseRegistrationRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{

    protected $courseRepository;
    protected $userRepository;
    protected $diplomaRepository;
    protected $studentRepository;
    protected $notificationRepository;
    protected $requestData;
    protected $studentcourseregistrationrequest;


    public function __construct(ICourseRepository $courseRepository,
                                IUserRepository $userRepository,
                                IDiplomaRepository $diplomaRepository,
                                IStudentRepository $studentRepository,
                                INotificationRepository $notificationRepository,
                                IStudentCourseRegistrationRequestRepository $studentcourseregistrationrequest)
    {
        $this->courseRepository = $courseRepository;
        $this->userRepository = $userRepository;
        $this->diplomaRepository = $diplomaRepository;
        $this->studentRepository = $studentRepository;
        $this->notificationRepository = $notificationRepository;
        $this->studentcourseregistrationrequest = $studentcourseregistrationrequest;
        $this->requestData = Mapper::toUnderScore(Request()->all());
        $this->middleware('permission:courses')->only(['index']);
        $this->middleware('permission:create courses')->only(['create']);
        $this->middleware('permission:update courses')->only(['edit']);
        $this->middleware('permission:delete courses')->only(['destroy']);
        $this->middleware('permission:show course')->only(['show']);
        $this->middleware('permission:finish-activate course')->only(['changeFinishStatus']);
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
                $courses = auth('admin')->user()->courses;//$this->courseRepository->all();
            }
            else {
                $courses = $this->courseRepository->all();
            }
            return view('admin.courses.list', compact('courses'));

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

            $diplomas = $this->diplomaRepository->all();
            $teachers = $this->userRepository->getUsersByRole(2); // teachers
            return view('admin.courses.add', compact('diplomas', 'teachers'));

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
            $teachers = $data['teachers'];
            $data['diploma_id'] = $this->requestData['diploma'];


            $validator = Validator::make($data, $validator_rules = Course::create_update_rules);

            if($request->testPercentage +$request->homeworkPercentage +$request->presencePercentage !==100 )
            {
                return redirect()->route('course.create')->with('error', 'مجموع النسب المئوية لا يساوي 100');

            }

            if ($validator->passes()) {
                if( $request->file('photo'))
                {

                    $data['image'] = $request->file('photo')->getClientOriginalName();
                    $request->photo->move(public_path('Course/' . $request->title), $data['image']);
                }
                $course=  Course::create([
                    'diploma_id'=>$request->diploma,
                    'title'=>$request->title,
                    'desc'=>$request->desc,
                    'testPercentage'=>$request->testPercentage,
                    'homeworkPercentage'=>$request->homeworkPercentage,
                    'presencePercentage'=>$request->presencePercentage,
                    'image' => $data['image']
               ]);


               // $course = $this->courseRepository->create($data);

                $course->users()->attach($teachers);

                $fcm_data = [
                    'course_id' => $course->id,


                ];
                $fcm_message = Constants::NEW_COURSE_MSG_AR . $course->title;
                $fcm_title = Constants::NEW_COURSE_TITLE_AR;

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

                $not_data['type'] = 'new_course';
                $not_data['fcm_message_en'] = Constants::NEW_COURSE_MSG_EN . $course->title;
                $not_data['fcm_title_en'] = Constants::NEW_COURSE_TITLE_EN;
                $not_data['fcm_message_ar'] = Constants::NEW_COURSE_MSG_AR . $course->title;
                $not_data['fcm_title_ar'] = Constants::NEW_COURSE_TITLE_AR;
                $not_data['fcm_data'] = json_encode($fcm_data);
                $not_data['user_type'] = 'student';
                $not_data['user_id'] = null;


                foreach ($students as $student) {
                    $not_data['student_id'] = $student->id;
                    $this->notificationRepository->create($not_data);
                }

                return redirect()->route('course.index')->with('message', trans('courses/courses.Course_Added_Successfully'));

            }
            $errorString = implode(",", $validator->errors()->all());
           // return JsonResponse::respondError($errorString);
            return redirect()->route('course.create')->with('error', $errorString);

        } catch (Exception $e) {
            return redirect()->route('course.create')->with('error', $e->getMessage());

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
        $course = $this->courseRepository->showCourse($id);
        $diplomas =  $course->diploma()->first();
        $teachers = $course->users()->get();
        // print_r($teachers);
        // die();
        return view('admin.courses.show', compact('course','diplomas','teachers'));
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

            $diplomas = $this->diplomaRepository->all();
            $course = $this->courseRepository->find($id);
            $teachers = $this->userRepository->getUsersByRole(2); // teachers

            $selectedTeachers = $course->users->pluck('id')->toArray();

            return view('admin.courses.edit', compact('course','diplomas', 'teachers', 'selectedTeachers' ));

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
            $teachers = $data['teachers'];

            $data['diploma_id'] = $this->requestData['diploma'];




            $validator = Validator::make($data, $validator_rules = Course::create_update_rules);
            if($request->testPercentage +$request->homeworkPercentage +$request->presencePercentage !==100 )
            {
                return redirect()->route('course.index')->with('error', 'مجموع النسب المئوية لا يساوي 100');

            }
            if ($validator->passes()) {
                if( $request->file('photo'))
                {
                    $data['photo'] = $request->file('photo')->getClientOriginalName();
                    $request->photo->move(public_path('Course/' . $request->title), $data['photo']);
                    Course::where('id',$id)->update([
                        'diploma_id'=>$request->diploma,
                        'title'=>$request->title,
                        'desc'=>$request->desc,
                        'testPercentage'=>$request->testPercentage,
                        'homeworkPercentage'=>$request->homeworkPercentage,
                        'presencePercentage'=>$request->presencePercentage,
                        'image' => $data['photo']

                    ]);
                }else{
                    Course::where('id',$id)->update([
                        'diploma_id'=>$request->diploma,
                        'title'=>$request->title,
                        'desc'=>$request->desc,
                        'testPercentage'=>$request->testPercentage,
                        'homeworkPercentage'=>$request->homeworkPercentage,
                        'presencePercentage'=>$request->presencePercentage,


                    ]);

                }

                $course = $this->courseRepository->find($id);

                $course->users()->sync($teachers);


                return redirect()->route('course.index')->with('message', trans('courses/courses.Course_Updated_Successfully'));

            }
            return redirect()->route('course.edit', $id)->with('error', trans('general.Operation_Failed'));

        } catch (Exception $e) {
            return redirect()->route('course.edit', $id)->with('error', $e->getMessage());

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

            $this->courseRepository->delete($id);
            return JsonResponse::respondSuccess(trans('common_msg.' . JsonResponse::MSG_DELETED_SUCCESSFULLY));
        } catch (Exception $ex) {
            return JsonResponse::respondError($ex->getMessage());
        }
    }

    function pending($id){
        $CourseStudent=$this->studentcourseregistrationrequest->getSubscriptionsByIdAndStatus($id,'Pending');
        // $CourseStudent = StudentCourseRegistrationRequest::where('course_id',$id)->where('status', 'Pending')->get();
        return view('admin.courses.pending', compact('CourseStudent'));
    }

    function accept($id){
        $CourseStudent=$this->studentcourseregistrationrequest->updateSubscriptionsByIdAndStatus($id,'Accept');
       // $CourseStudent=StudentCourseRegistrationRequest::findOrFail($id);
        // $CourseStudent->status = 'Accept';
        // $CourseStudent->save();
        // $CourseStudent = StudentCourseRegistrationRequest::where('course_id',$id)->where('status', 'Pending')->get();
        return redirect()->route('course.pending', ['id' => $id])->with('message', trans('courses/courses.Request_Accept_Successfully'));
        // return view('admin.courses.pending', compact('CourseStudent'));
    }

    function reject($id){
        $CourseStudent=$this->studentcourseregistrationrequest->updateSubscriptionsByIdAndStatus($id,'Reject');
        // $CourseStudent=StudentCourseRegistrationRequest::findOrFail($id);
        // $CourseStudent->status = 'Reject';
        // $CourseStudent->save();
        // $CourseStudent = StudentCourseRegistrationRequest::where('course_id',$id)->where('status', 'Pending')->get();
        return redirect()->route('course.pending' , ['id' => $id])->with('error', trans('courses/courses.Request_Reject_Successfully'));
        // return view('admin.courses.pending', compact('CourseStudent'));
    }

    function pendinglist(){
        $CourseStudentPending=$this->studentcourseregistrationrequest->getSubscriptionsByStatus('Pending');
        $CourseStudentAccept=$this->studentcourseregistrationrequest->getSubscriptionsByStatus('Accept');
        $CourseStudentReject=$this->studentcourseregistrationrequest->getSubscriptionsByStatus('Reject');
        // $CourseStudent = StudentCourseRegistrationRequest::where('course_id',$id)->where('status', 'Pending')->get();
        return view('admin.courses.pendinglist', compact('CourseStudentPending','CourseStudentAccept','CourseStudentReject'));
    }

    function rejectlist($id){
        $CourseStudent=$this->studentcourseregistrationrequest->updateSubscriptionsByIdAndStatus($id,'Reject');
        $CourseStudentPending=$this->studentcourseregistrationrequest->getSubscriptionsByStatus('Pending');
        $CourseStudentAccept=$this->studentcourseregistrationrequest->getSubscriptionsByStatus('Accept');
        $CourseStudentReject=$this->studentcourseregistrationrequest->getSubscriptionsByStatus('Reject');
        return redirect()->route('course.pendinglist' , compact('CourseStudentPending','CourseStudentAccept','CourseStudentReject'))->with('error', trans('courses/courses.Request_Reject_Successfully'));
        // return view('admin.courses.pending', compact('CourseStudent'));
    }

    function acceptlist($id){
        $CourseStudent=$this->studentcourseregistrationrequest->updateSubscriptionsByIdAndStatus($id,'Accept');
        $CourseStudentPending=$this->studentcourseregistrationrequest->getSubscriptionsByStatus('Pending');
        $CourseStudentAccept=$this->studentcourseregistrationrequest->getSubscriptionsByStatus('Accept');
        $CourseStudentReject=$this->studentcourseregistrationrequest->getSubscriptionsByStatus('Reject');
        return redirect()->route('course.pendinglist' , compact('CourseStudentPending','CourseStudentAccept','CourseStudentReject'))->with('message', trans('courses/courses.Request_Accept_Successfully'));
    }


    public function changeFinishStatus()
    {
        //
        try {

            $id = $this->requestData['course_id'];
            $course = $this->courseRepository->find($id);
            $finish_status = $course->is_finished;

            if($finish_status == 0){
                $data['is_finished'] = 1;
                $msg = trans('courses/courses.Course_Finished_Successfully');
            }else{
                $data['is_finished'] = 0;
                $msg = trans('courses/courses.Course_Activated_Successfully');
            }
            $validator_rules = [
                'is_finished' => 'required'
            ];

            $validator = Validator::make($data, $validator_rules);

            if ($validator->passes()) {


                $course = $this->courseRepository->update($data, $id);


                return redirect()->route('course.index')->with('message', $msg);

            }
            return redirect()->route('course.index')->with('error', trans('general.Operation_Failed'));

        } catch (Exception $ex) {
            return redirect()->route('course.index')->with('error', $ex->getMessage());

        }


    }


}
