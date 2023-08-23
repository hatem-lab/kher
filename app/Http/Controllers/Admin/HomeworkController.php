<?php

namespace App\Http\Controllers\Admin;
use App\Helpers\Constants;
use App\Helpers\JsonResponse;
use App\Helpers\Mapper;
use App\Helpers\Notifications;
use App\Http\IRepositories\IHomeworkRepository;

use App\Http\Controllers\Controller;
use App\Http\IRepositories\INotificationRepository;
use App\Http\Requests\FileRequest;
use App\Models\Course;
use App\Models\File;
use App\Models\Homework;
use App\Models\Student;
use App\Models\StudentFile;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class HomeworkController extends Controller
{

    protected $homeworkRepository;
    protected $notificationRepository;
    protected $requestData;
    public function __construct(IHomeworkRepository  $homeworkRepository,
                                INotificationRepository $notificationRepository)
    {
        $this->homeworkRepository = $homeworkRepository;
        $this->notificationRepository = $notificationRepository;
        $this->requestData = Mapper::toUnderScore(Request()->all());
        $this->middleware('permission:Homework');
        $this->middleware('permission:list Homework')->only(['index']);
        $this->middleware('permission:add files')->only(['add_files']);
        $this->middleware('permission:create Homework')->only(['create']);
        $this->middleware('permission:update Homework')->only(['edit']);
        $this->middleware('permission:show Homework')->only(['show']);
        $this->middleware('permission:delete Homework')->only(['destroy']);
        $this->middleware('permission:student Homework')->only(['homeworkStudents']);
    }

    public function index(Request $request)
    {
        try {
            if(auth('admin')->user()->role == 2 ){
                $data= auth('admin')->user()->homeworks;
                // $courses = auth('admin')->user()->homeworks;//$this->courseRepository->all();
            }
            else {
                $data= $this->homeworkRepository->getAllHomework($request);
            }

        return view('admin.homework.list',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);

        } catch (Exception $e) {
            return $e->getMessage();
        }

    }

    public function create()
    {
        $data= $this->homeworkRepository->createHomework();
        return view('admin.homework.add',$data);
    }

    public function store(Request $request)
    {
        $data = $this->requestData;


        $homework = $this->homeworkRepository->storeHomework($data);

        $fcm_data = [
            'homework_id' => $homework->id,


        ];
        $fcm_message = Constants::NEW_HOMEWORK_MSG_AR . $homework->title;
        $fcm_title = Constants::NEW_HOMEWORK_TITLE_AR;

        $students = $homework->lecture->course->students;

        $student_tokens = [];
        foreach ($students as $student) {
            if ($student->fcm_token != '0') {
                array_push($student_tokens, $student->fcm_token); // (logged in) just get a valid fcm_token for admin
            }
        }

        if (!empty($student_tokens)) {
            $notification = Notifications::addNotification($student_tokens, $fcm_title, $fcm_message, $fcm_data);

        }

        $not_data['type'] = 'new_homework';
        $not_data['fcm_message_en'] = Constants::NEW_HOMEWORK_MSG_EN . $homework->title;
        $not_data['fcm_title_en'] = Constants::NEW_HOMEWORK_TITLE_EN;
        $not_data['fcm_message_ar'] = Constants::NEW_HOMEWORK_MSG_AR . $homework->title;
        $not_data['fcm_title_ar'] = Constants::NEW_HOMEWORK_TITLE_AR;
        $not_data['fcm_data'] = json_encode($fcm_data);
        $not_data['user_type'] = 'student';
        $not_data['user_id'] = null;


        foreach ($students as $student) {
            $not_data['student_id'] = $student->id;
            $this->notificationRepository->create($not_data);
        }

        return redirect()->route('homework.index')
            ->with('message',trans('Homework/Homework.homework_Added_Successfully'));
    }

    public function show($id)
    {
      $data=  $this->homeworkRepository->showHomework($id);
      return view('admin.homework.show',$data);
    }

    public function edit($id)
    {
        $data= $this->homeworkRepository->editHomework($id);
        return view('admin.homework.edit',$data);
    }

    public function update(Request $request, $id)
    {

        $this->homeworkRepository->updateHomework($request,$id);
        return redirect()->route('homework.index')
            ->with('message',trans('Homework/Homework.homework_Updated_Successfully'));

    }

    public function destroy($id)
    {try {

        $this->homeworkRepository->delete($id);
        return JsonResponse::respondSuccess(trans('common_msg.' . JsonResponse::MSG_DELETED_SUCCESSFULLY));
    } catch (Exception $ex) {
        return JsonResponse::respondError($ex->getMessage());
    }
    }

    public function attachments(FileRequest $request)
    {
        try {

            $image = $request->file('file');
            $file_name = $image->getClientOriginalName();
            $attachment = new File();
            $attachment->path = $file_name;
            $attachment->homework_id = $request->homework_id;
            $attachment->name = $request->name;
            $attachment->type = 1;
            $attachment->save();
            // move pic
            $imageName = $request->file->getClientOriginalName();
            $request->file->move(public_path('Homework/' . $request->name), $imageName);
            $attachments = File::where('homework_id', $request->homework_id)->get();
            $view = view('admin.homework._showlist')->with(['attachments' => $attachments, 'id' => $request->homework_id])
                ->renderSections();

            return response()->json([
                'status' => true,
                'content' => $view['main']
            ]);


        } catch (Exception $ex) {
            return JsonResponse::respondError($ex->getMessage());
        }

    }

    public function get_file($path,$file_name)

    {
        try {
        $contents= Storage::disk('public_uploads_homework')->getDriver()->getAdapter()->applyPathPrefix($file_name.'/'.$path);
        return response()->download( $contents);
        } catch (Exception $ex) {
            return JsonResponse::respondError($ex->getMessage());
        }
    }

    public function open_file($path,$file_name)

    {
        try {
            $files = Storage::disk('public_uploads_homework')->getDriver()->getAdapter()->applyPathPrefix($file_name.'/'.$path);
            return response()->file($files);
        } catch (Exception $ex) {
            return JsonResponse::respondError($ex->getMessage());
        }
    }
    public function destroy_file(Request $request,$id)
    {
        try {
            $attachment = File::findOrFail($id);
            $file_name=$attachment->name;
            $path=$attachment->path;
            $attachment->delete();
            Storage::disk('public_uploads_homework')->delete($file_name.'/'.$path);
            return JsonResponse::respondSuccess(trans('common_msg.' . JsonResponse::MSG_DELETED_SUCCESSFULLY));

        } catch (Exception $ex) {
            return JsonResponse::respondError($ex->getMessage());
        }


    }

    public function add_files(Request $request,$id)
    {
        try {
            $homework=Homework::find($id);
            $attachments=File::where('homework_id',$homework->id)->get();
            return view('admin.homework.add_files',compact('attachments','homework'));

        } catch (Exception $ex) {
            return JsonResponse::respondError($ex->getMessage());
        }


    }

    public function homeworkStudents($id)
    {
        //
        try {

            $homework=Homework::find($id);
            $students_homework = $homework->students;



            $ids=[];

            foreach ($students_homework as $one) {

                if(StudentFile::where('homework_id', $homework->id)->where('student_id', $one->id)->first())
                {
                    $ids []= StudentFile::where('homework_id', $homework->id)->where('student_id', $one->id)->first()->student_id;

                }
            }


            $students=Student::whereIn('id',$ids)->get();

            //$students_file=StudentFile::where('')

            return view('admin.homework.students', compact('homework', 'students'));

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public function homeworkStudentsAnswers($id, $stud_id)
    {
        //
        try {

            $homework=Homework::find($id);
            $student = Student::find($stud_id);



            return view('admin.homework.studentAnswers', compact('homework', 'student'));

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function correctStudentsAnswers($id, $stud_id,Request $request)
    {
        //

        try {
            $homework=Homework::find($id);
            $students = $homework->students;
            $mark=$request->mark;
            $student_file=StudentFile::where('homework_id',$id)->where('student_id',$stud_id)->first();
            $student_file->mark=$mark;
            $student_file->save();
            return view('admin.homework.students')->with(['edit','User has Deleted Successfully','students'=>$students,'homework'=>$homework]);



        } catch (Exception $e) {
            return redirect()->route('homework.students.answers',[$id, $stud_id])->with('error', $e->getMessage());

        }
    }

    public function get_file_student($path,$file_id)

    {
        try {
            $contents= Storage::disk('public_uploads_homework_student_file')->getDriver()->getAdapter()->applyPathPrefix($file_id.'/'.$path);
            return response()->download( $contents);
        } catch (Exception $ex) {
            return JsonResponse::respondError($ex->getMessage());
        }
    }

    public function open_file_student($path,$file_id)

    {
        try {
            $files = Storage::disk('public_uploads_homework_student_file')->getDriver()->getAdapter()->applyPathPrefix($file_id.'/'.$path);
            return response()->file($files);
        } catch (Exception $ex) {
            return JsonResponse::respondError($ex->getMessage());
        }
    }

    public function selectLectures($id)

    {
        try {
          $course=Course::where('id',$id)->first();
            $lectures=$course->lectures;


          return $lectures;
        } catch (Exception $ex) {
            return JsonResponse::respondError($ex->getMessage());
        }
    }

    public function selectStudents($id)

    {
        try {
            $course=Course::where('id',$id)->first();

            $students=$course->students;

            return $students;
        } catch (Exception $ex) {
            return JsonResponse::respondError($ex->getMessage());
        }
    }
    public function selectTeachers($id)

    {
        try {
            $course=Course::where('id',$id)->first();

            $teachers=$course->users;

            return $teachers;
        } catch (Exception $ex) {
            return JsonResponse::respondError($ex->getMessage());
        }
    }











}
