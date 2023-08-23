<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\General;
use App\Helpers\JsonResponse;
use App\Helpers\Mapper;
use App\Http\Controllers\Controller;
use App\Http\IRepositories\IStudentRepository;
use App\Http\Requests\StudentRequest;
use App\Http\Requests\StudentUpdateRequest;
use App\Models\Course;
use App\Models\Diploma;
use App\Models\RequestCertificate;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\URL;
class StudentController extends Controller
{


    protected $studentRepository;
    protected $requestData;

    public function __construct(IStudentRepository  $studentRepository)
    {
        $this->studentRepository = $studentRepository;
        $this->requestData = Mapper::toUnderScore(Request()->all());

        $this->middleware('permission:Students');
        $this->middleware('permission:list Students')->only(['index']);
        $this->middleware('permission:create Student')->only(['create']);
        $this->middleware('permission:update Student')->only(['edit']);
        $this->middleware('permission:show Student')->only(['show']);
        $this->middleware('permission:delete Student')->only(['destroy']);
        $this->middleware('permission:list pending Students')->only(['pending_registration_request']);
        $this->middleware('permission:block-activate Student')->only(['change_status']);
        $this->middleware('permission:accept-registration Student')->only(['acceptStudent']);
        $this->middleware('permission:List Certificates Requests')->only(['request']);
        $this->middleware('permission:create student certificate')->only(['pdf']);

    }

    public function request()
    {
        $requests=RequestCertificate::all();
        return view('admin.students.requests',compact('requests'));
    }

    public function open_certificate_student($id)

    {
        try {
            $request =RequestCertificate::find($id);
            $files = Storage::disk('public_uploads_Profile')->getDriver()->getAdapter()->applyPathPrefix($request->path);


            return response()->file($files);
        } catch (Exception $ex) {
            return JsonResponse::respondError($ex->getMessage());
        }
    }


    public function pdf($request_sent,$student_id,$diploma_id)
    {

        $grade=0;
        $grade_array=[];
        $student=Student::find($student_id);
        $diploma=Diploma::find($diploma_id);
        $student=Student::find($student_id);
        $courses=Course::where('diploma_id',$diploma->id)->get();
        foreach ($courses as $one)
        {
            $grade+=General::studentResult($one,$student->id);
            $grade_array[]=General::studentResult($one,$student->id);
        }
        if(count($grade_array) > 0)
        {
            $final_grade=$grade/count($grade_array);
        }else
        {
            $final_grade=0;
        }

        $myfile=$student->id;
        $path='Profile/students/'.$myfile.'.pdf';
        $request=RequestCertificate::find($request_sent);
        $request->status=2;
        $request->path='students/'.$myfile.'.pdf';
        $request->save();
        $message = "Congraduation, your Certificate From Diploma:".$diploma->title;
        //$link = Storage::disk('public_uploads_Profile')->getDriver()->getAdapter()->applyPathPrefix($request->path);
        $link= URL::to('/') . '/Profile/' . $request->path;
        $email_from='khire@gmail.com';
        $to_email =$student->email ;
        $data = array('name'=>$student->name_ar, "body" => $message,"email"=>$email_from,'path'=>$link );
        Mail::send('email_certificate', $data,function($message) use ( $email_from,$to_email) {
            $message->to($to_email)->subject('Certificate Mail');
            $message->from($email_from);
        });

        $data = [
            'date' => date('m/d/Y'),
            'grade'=>$final_grade,
            'diploma'=>$diploma->title_en,
            'name'=>$student->name_en,
            'image'=>'http://127.0.0.1:8000/assets/img/brand/logo-1.png',
        ];

        $pdf = PDF::loadView('certificate.pdf', $data)
            ->setPaper('a4', 'portrait')
            ->save($path);

        return $pdf->stream();


    }


    public function index()
    {
        $data= $this->studentRepository->getStudents();
        $students=$data['students'];
        $courses=$data['courses'];
        return view('admin.students.index',compact('students','courses'));
    }

    public function studentsCousres($courseId)
    {
        $courses=Course::all();
        $course=Course::find($courseId);
        $students=$course->students;

        return view('admin.students.index',compact('students','courses','course'));
    }



    public function create()
    {
        $certificate= $this->studentRepository->createStudent();
        return view('admin.students.create',compact('certificate'));
    }


    public function store(StudentRequest $request)
    {
         $this->studentRepository->storeStudent($request);
        return redirect()->route('students.index')
            ->with('success','Student has Added Successfully');
    }

    public function show($id)
    {
        $student = $this->studentRepository->ShowStudent($id);
        return view('admin.students.show',compact('student'));
    }

    public function edit($id)
    {
        $data=  $this->studentRepository->editStudent($id);

        return view('admin.students.edit',$data);
    }

    public function update(Request $input, $id)
    {
        try {
            $student = Student::find($id);
            $input = $input->all();
            if(!empty($input['password'])){

                $validator = Validator::make($input, [
                    'password' => 'required|min:6',
                    'confirm-password' =>'required_with:password|same:password'
                ]);
                if ($validator->fails()) {

                    return redirect()->back()->withErrors($validator);
                }

                if($validator->passes()) {
                    $input['password'] = Hash::make($input['password']);
                }

            }else{
                $input['password']=$student->password;
            }
            $student->update($input);

        } catch (Exception $exception) {
            throw new Exception('common_msg.' . trans($exception->getMessage()));
        }


        return redirect()->route('students.index')->with('edit','Student information has updated successfully');


    }

    public function destroy($id)
    {
        try {

            $this->studentRepository->delete($id);
            return JsonResponse::respondSuccess(trans('common_msg.' . JsonResponse::MSG_DELETED_SUCCESSFULLY));
        } catch (Exception $ex) {
            return JsonResponse::respondError($ex->getMessage());
        }

//        $this->studentRepository->deleteStudent($req);
//        return redirect()->route('students.index')->with('delete','Student has Deleted Successfully');
    }

    public function pending_registration_request()
    {

        try {

            $students= $this->studentRepository->getStudentByStatus(0);
            return view('admin.students.pending_students',compact('students'));

        } catch (Exception $exception) {
            throw new Exception('common_msg.' . trans($exception->getMessage()));
        }


    }



    public function acceptStudent($id)
    {
        //
        try {


            $data['status'] = 1;
            $validator_rules = [
                'status' => 'required'
            ];
//            dd($data);
            $validator = Validator::make($data, $validator_rules);

            if ($validator->passes()) {


                $course = $this->studentRepository->update($data, $id);


                return JsonResponse::respondSuccess(trans('common_msg.' . JsonResponse::MSG_DELETED_SUCCESSFULLY));

            }
            return JsonResponse::respondError($validator->errors()->all());

        } catch (Exception $ex) {
            return JsonResponse::respondError($ex->getMessage());
        }


    }


    public function destroyStudent($id)
    {
        //
        try {

            $this->studentRepository->delete($id);
            return JsonResponse::respondSuccess(trans('common_msg.' . JsonResponse::MSG_DELETED_SUCCESSFULLY));
        } catch (Exception $ex) {
            return JsonResponse::respondError($ex->getMessage());
        }


    }

    public function resultStudent($id)
    {
        //
        try {

            $student=$this->studentRepository->find($id);
            return view('admin.students.result',compact('student'));
        } catch (Exception $ex) {
            return JsonResponse::respondError($ex->getMessage());
        }


    }

    public function change_status()
    {
        //
        try {

            $id = $this->requestData['student_id'];
            $student = $this->studentRepository->find($id);
            $status = $student->status;

            if($status == 1){
                $data['status'] = 2;
                $msg = trans('students/students.Student_Blocked_Successfully');
            }else{
                $data['status'] = 1;
                $msg = trans('students/students.Student_Activated_Successfully');
            }
            $validator_rules = [
                'status' => 'required'
            ];

            $validator = Validator::make($data, $validator_rules);

            if ($validator->passes()) {


                $course = $this->studentRepository->update($data, $id);


                return redirect()->route('students.index')->with('message', $msg);

            }
            return redirect()->route('students.index')->with('error', trans('general.Operation_Failed'));

        } catch (Exception $ex) {
            return redirect()->route('students.index')->with('error', $ex->getMessage());

        }


    }

}
