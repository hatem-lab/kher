<?php

namespace App\Http\Controllers\Site;
use App\Helpers\JsonResponse;
use App\Http\IRepositories\ILoginRepository;
use App\Http\IRepositories\IUserRepository;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Certificate;
use App\Models\Course;
use App\Models\CourseStudent;
use App\Models\File;
use App\Models\Homework;
use App\Models\Student;
use App\Models\StudentFile;
use App\Models\User;
use App\Models\Diploma;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use DateTime;
use Illuminate\Support\Facades\Validator;

class ProgressController extends Controller
{


    public function  getProgressStudent()
    {

        if(auth('student')->user())
        {

            $student=auth('student')->user();
            $certificate=Certificate::all();
            $diplomas = DB::select('SELECT `diplomas`.`id`,`diplomas`.`title`,`diplomas`.`desc`,`diplomas`.`image`,`course_students`.`course_id` FROM `diplomas` INNER join `courses` on `courses`.`diploma_id`=`diplomas`.`id` INNER JOIN `course_students` on `course_students`.`course_id`=`courses`.`id` INNER join `students` on `students`.`id`=`course_students`.`student_id` WHERE `students`.`id`='.$student->id.' GROUP by `diplomas`.`id`');




            $courses=DB::select('SELECT `courses`.`id`,`courses`.`title`,`courses`.`desc`,`courses`.`diploma_id`,`is_finished` FROM `courses` INNER JOIN `course_students` on `course_students`.`course_id`=`courses`.`id` INNER join `students` on `students`.`id`=`course_students`.`student_id` WHERE `students`.`id`='.$student->id);
            $diplomas_student = DB::select('SELECT `diplomas`.`id`,`diplomas`.`title`,`diplomas`.`desc`,`diplomas`.`image`,`course_students`.`course_id` FROM `diplomas` INNER join `courses` on `courses`.`diploma_id`=`diplomas`.`id` INNER JOIN `course_students` on `course_students`.`course_id`=`courses`.`id` INNER join `students` on `students`.`id`=`course_students`.`student_id` WHERE `students`.`id`='.$student->id. ' GROUP by `diplomas`.`id`');

            return view('user.progress',compact('student','diplomas','courses','diplomas_student'));



        }


    }
    public function  Course_Details($id)
    {
        $course= Course::where('id',$id)->first();


            return view('user.course-details-student',compact('course'));






    }



    public function  UpdateProfileStudent(Request $request)
    {


        if(auth('student')->user())
        {
            $user=auth('student')->user();

            $input = $request->all();

            if(!empty($input['password'])){
                $validator = Validator::make($input, [
                    'password' => 'required|min:3',
//                    'confirm_password' =>'required_with:password|same:password'
                ]);

                if ($validator->fails()) {

                    return redirect()->back()->withErrors($validator);
                }

                if($validator->passes()) {
                    $input['password'] = Hash::make($input['password']);
                    $user->password=$input['password'];
                    $user->name_ar=$input['name_ar'];
                    $user->name_en=$input['name_en'];
                    $user->certificate_id=$input['certificate_id'];
                    $user->email=$input['email'];
                    $user->username=$input['name_ar'];
                    $user->Save();
                }

            }else{

                $user->name_ar=$input['name_ar'];
                $user->name_en=$input['name_en'];
                $user->certificate_id=$input['certificate_id'];
                $user->email=$input['email'];
                $user->username=$input['name_ar'];
                $user->Save();

                $profile=$user->profile;


                if($request->file)
                {

                    $image=$input['file'];

                    $file_name = $image->getClientOriginalName();
                    $profile->update([
                        'image'=>$file_name,
                    ]);
                    $imageName = $request->file->getClientOriginalName();
                    $request->file->move(public_path('Profile/students'), $imageName);
                }
                $profile->update([
                    'phone'=>$request->phone,
                    'birthday'=>$input['birthday'] ? $request->birthday : $user->profile->birthday,
                    'address'=>$request->address,
                ]);


            }
            return redirect()->route('student.profile')
                ->with('edit','User information has updated successfully');
        }


    }


    public function  SaveFiles(Request $request, $id)
    {

            $image = $request->file('file');
            $file_name = $image->getClientOriginalName();
            $attachment = new StudentFile();
            $attachment->path = $file_name;
            $attachment->homework_id = $id;
            $attachment->student_id = auth('student')->user()->id;
            $attachment->save();
            // move pic
            $imageName = $request->file->getClientOriginalName();

            $request->file->move(public_path('StudentFiles/' . $attachment->id), $imageName);
           return back();


    }

    public function  profile(){
        if(auth('student')->user())
        {

            $student=auth('student')->user();
            $certificate=Certificate::all();

            // return view('user.progress',compact('student','certificate'));
            return view('user.profile2',compact('student','certificate'));



        }
    }

    }

