<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\JsonResponse;
use App\Helpers\Mapper;
use App\Http\Controllers\Controller;
use App\Http\IRepositories\ICourseRepository;
use App\Http\IRepositories\ILectureRepository;
use App\Models\Course;
use App\Models\File;
use App\Models\Homework;
use App\Models\Lecture;
use App\Models\Schedule;
use App\Models\Student;
use App\Models\Test;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
class ScheduleController extends Controller
{
    protected $courseRepository;
    protected $lectureRepository;
    protected $requestData;


    public function __construct(ILectureRepository $lectureRepository,
                                ICourseRepository $courseRepository)
    {
        $this->courseRepository = $courseRepository;
        $this->lectureRepository = $lectureRepository;
        $this->requestData = Mapper::toUnderScore(Request()->all());

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

            $lectures = $this->lectureRepository->all();
            return view('admin.lectures.list', compact('lectures'));

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


            $students=Student::all();
            $test=Test::all();
            $lectures=Lecture::where('link',Null)->get();
            $teachers=user::where('role',2)->get();
            return view('admin.schedules.add', compact('students','teachers','lectures','test'));

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

             $lecture=Lecture::find($request->lecture_id);
              foreach ($request->students as $one)
              {
                  $schedule=new Schedule();
                  $schedule->student_id=$one;
                  $schedule->lecture_id=$request->lecture_id;
                  $schedule->user_id=$request->teacher_id;
                  $schedule->start_date=$lecture->start_date;
                  $schedule->end_date=$lecture->end_date;
                  $schedule->save();
              }

            return redirect()->back();

        } catch (Exception $e) {
            return redirect()->route('schedule.create')->with('error', $e->getMessage());

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
            $lecture = $this->lectureRepository->find($id);

            return view('admin.lectures.edit', compact('lecture','courses' ));

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
            $data['course_id'] = $this->requestData['course'];
            $type = $this->requestData['type'];
            if($type == 0){
               $data['link'] = '';
            }
//            dd($data);
            $validator = Validator::make($data, $validator_rules = Lecture::create_update_rules);

            if ($validator->passes()) {


                $user = $this->lectureRepository->update($data, $id);


                return redirect()->route('lecture.index')->with('message', trans('lectures/lectures.Lecture_Updated_Successfully'));

            }
            return redirect()->route('lecture.edit')->with('error', trans('general.Operation_Failed'));

        } catch (Exception $e) {
            return redirect()->route('lecture.edit')->with('error', $e->getMessage());

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

            $this->lectureRepository->delete($id);
            return JsonResponse::respondSuccess(trans('common_msg.' . JsonResponse::MSG_DELETED_SUCCESSFULLY));
        } catch (Exception $ex) {
            return JsonResponse::respondError($ex->getMessage());
        }
    }



    public function getlectureId(Request $request)
    {
        return Lecture::find($request->lecture_id);

    }

        public function validateDate(Request $request,$id)
    {
        try {

           $ids=explode(',', $id);
           $array=[];
//            return response()->json([
//                'status'=>1,
//                'data'=> substr($id, -1)
//            ]);
            foreach( $ids as $one1)
            {

                $student=Student::find($one1);
                $lecture=Lecture::find($request->lecture_id);
                $schedule=Schedule::where('student_id',$student->id)->where('lecture_id',$lecture->id)->first();
                foreach ($student->tests as $one)
                {
                    $test = Test::where('id',$one->id)->whereBetween('date',[$lecture->start_date,$lecture->end_date])
                        ->first();
                    if( $test)
                    {

                    }
                    else
                    {
                        $data='this student has test in this date';
                        $status=2;
                        return response()->json([
                            'status'=>$status,
                            'data'=>$data
                        ]);
                    }
                }
                if($schedule == null)
                {
//                    return response()->json([
//                        'status'=>1,
//
//                    ]);
                }
                else
                {
                    $schedules_student=$student->schedules;
                    foreach ($schedules_student as  $one)
                    {
                        $student = Schedule::where('id',$one->id)->whereBetween('start_date',[$lecture->start_date,$lecture->end_date])
                            ->whereBetween('end_date',[$lecture->start_date,$lecture->end_date])
                            ->get();
                    }
                    if($student->isEmpty())
                    {

//                        return response()->json([
//                            'status'=>1,
//
//                        ]);
                    }
                    else{
                        $data='this student has anthor schedule';
                        $status=2;
                        return response()->json([
                            'status'=>$status,
                            'data'=>$data,

                        ]);
                    }
                }


            }




        } catch (Exception $ex) {
            return JsonResponse::respondError($ex->getMessage());
        }
    }


    public function validateDateTeacher(Request $request,$id)
    {
        try {
            $teacher=User::find($id);
            $lecture=Lecture::find($request->lecture_id);
            $schedule=Schedule::where('user_id',$teacher->id)->where('lecture_id',$lecture->id)->first();

             foreach ($teacher->tests as $one)
                {
                    $test = Test::where('id',$one->id)->whereBetween('date',[$lecture->start_date,$lecture->end_date])
                        ->first();
                    if( $test)
                    {

                    }
                    else
                    {
                        $data='this teacher has test in this date';
                        $status=2;
                        return response()->json([
                            'status'=>$status,
                            'data'=>$data
                        ]);
                    }
                }
            if($schedule == null)
            {
            }
            else
            {
                foreach ($teacher->schedules as $one)
                {
                    $teacher = Schedule::where('id',$one->id)->whereBetween('start_date',[$lecture->start_date,$lecture->end_date])
                        ->whereBetween('end_date',[$lecture->start_date,$lecture->end_date])
                        ->get();
                }
                if($teacher->isEmpty() )
                {
                        return response()->json([
                            'status'=>1,
                        ]);
                }
                else{
                    $data='this teacher has schedule in this date';
                    $status=2;
                    return response()->json([
                        'status'=>$status,
                        'data'=>$data
                    ]);
                }


            }


        } catch (Exception $ex) {
            return JsonResponse::respondError($ex->getMessage());
        }


    }






}
