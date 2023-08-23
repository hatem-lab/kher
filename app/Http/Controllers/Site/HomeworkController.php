<?php

namespace App\Http\Controllers\Site;

use App\Helpers\Constants;
use App\Helpers\JsonResponse;
use App\Helpers\Notifications;
use App\Http\IRepositories\ILoginRepository;
use App\Http\IRepositories\INotificationRepository;
use App\Http\IRepositories\IUserRepository;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Course;
use App\Models\CourseStudent;
use App\Models\File;
use App\Models\Homework;
use App\Models\Student;
use App\Models\StudentFile;
use App\Models\User;
use App\Models\Diploma;
use Carbon\Carbon;
use Carbon\Traits\Creator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use DateTime;

class HomeworkController extends Controller
{

    protected $notificationRepository;


    public function __construct(INotificationRepository $notificationRepository)
    {

        $this->notificationRepository = $notificationRepository;
    }


    public function getAllHomeworkStudent()
    {

        if (auth('student')->user()) {

            $student = auth('student')->user();
            $homeworks_students = $student->homeworks;

            return view('user.homework', compact('homeworks_students'));


        }


    }


    public function getHomeworkDetails($id)
    {

        if (auth('student')->user()) {
            $homework = Homework::find($id);
            return view('user.homework_details', compact('homework'));
        } elseif (auth('user')->user()) {
            $homework = Homework::find($id);
            return view('user.homework_details', compact('homework'));
        }


    }


    public function SaveFiles(Request $request, $id)
    {

        $image = $request->file('file');
        $file_name = $image->getClientOriginalName();
        $attachment = new StudentFile();
        $attachment->path = $file_name;
        $attachment->homework_id = $id;
        $attachment->student_id = auth('student')->user()->id;
        $attachment->save();
//        dd($attachment->homework->lecture->course->users);


        $imageName = $request->file->getClientOriginalName();

        $hw = $request->file->move(public_path('StudentFiles/' . $attachment->id), $imageName);

        if ($hw) {

            // todo tested
            $fcm_data = [
                'student_id' => auth('student')->user()->id,
                'homework_id' => $id
            ];
            $fcm_message = Constants::NEW_APPLY_HOMEWORK_MSG_AR . $attachment->homework->title;
            $fcm_title = Constants::NEW_APPLY_HOMEWORK_TITLE_AR;

            $admins = $attachment->homework->lecture->course->users; // teachers
            $admins_token = [];
            foreach ($admins as $admin) {
                if ($admin->fcm_token != '0') {
                    array_push($admins_token, $admin->fcm_token); // (logged in) just get a valid fcm_token for admin
                }
            }

            if (!empty($admins_token)) {
                $notification = Notifications::addNotification($admins_token, $fcm_title, $fcm_message, $fcm_data);

            }

            $not_data['type'] = 'student_homework';
            $not_data['fcm_message_en'] = Constants::NEW_APPLY_HOMEWORK_MSG_EN . $attachment->homework->title;
            $not_data['fcm_title_en'] = Constants::NEW_APPLY_HOMEWORK_TITLE_EN;
            $not_data['fcm_message_ar'] = Constants::NEW_APPLY_HOMEWORK_MSG_AR . $attachment->homework->title;
            $not_data['fcm_title_ar'] = Constants::NEW_APPLY_HOMEWORK_TITLE_AR;
            $not_data['fcm_data'] = json_encode($fcm_data);
            $not_data['user_type'] = 'user';
            $not_data['student_id'] = null;


            foreach ($admins as $admin) {
                $not_data['user_id'] = $admin->id;
                $this->notificationRepository->create($not_data);
            }


            return redirect()->route('student.homeworks')->with('message', 'تم إرسال ملف الوظيفة بنجاح');

        } else {
            return redirect()->route('student.homework')->with('error', 'لم يتم حفظ ملف الوظيفة');

        }


    }

}
