<?php

namespace App\Http\Controllers\Site;

use App\Helpers\Constants;
use App\Helpers\Notifications;
use App\Http\IRepositories\ICourseRepository;
use App\Http\IRepositories\IDiplomaRepository;
use App\Http\IRepositories\ILoginRepository;
use App\Http\IRepositories\INotificationRepository;
use App\Http\IRepositories\IUserRepository;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Course;
use App\Models\CourseStudent;
use App\Models\Library;
use App\Models\Setting;
use App\Models\Student;
use App\Models\StudentCourseRegistrationRequest;
use App\Models\User;
use App\Models\Diploma;
use App\Models\Lecture;
use App\Models\SettingImage;
use App\Models\LectureStudent;
use App\Models\RequestCertificate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use App\Http\Repository\UserRepository;
use DateTime;

class HomeController extends Controller
{
    protected $userRepository;
    protected $notificationRepository;
    protected $courseRepository;
    protected $diplomaRepository;

    public function __construct(IUserRepository $userRepository,
                                ICourseRepository $courseRepository,
                                INotificationRepository $notificationRepository,
                                IDiplomaRepository $diplomaRepository)
    {

        $this->userRepository = $userRepository;
        $this->notificationRepository = $notificationRepository;
        $this->courseRepository = $courseRepository;
        $this->diplomaRepository = $diplomaRepository;

    }

    public function home()
    {


        $blogs = Blog::where('status', 1)->inRandomOrder()->latest()->orderBy('created_at')->paginate(3);
        $users = User::where('role', 2)->get()->take(4);
        $courses = Course::latest()->get()->take(6);
        $course_num = count(Course::all());
        $diplomas_num = count(Diploma::all());
        $students_num = count(Student::all());
        $lecture_num = count(Lecture::all());
        $settingImage = SettingImage::get();
        $settings = Setting::first();

        $video = $settings->video;
        return view('user.home', compact('blogs', 'users', 'courses', 'course_num', 'diplomas_num', 'students_num', 'lecture_num', 'settingImage', 'video'));
    }

    public function about()
    {


        $settingImage = SettingImage::get();
        $settings = Setting::first();

        $video = $settings->video;
        return view('user.about', compact('settings', 'settingImage', 'video'));
    }


    public function library()
    {
        $libraries = Library::get();

        return view('user.library', compact('libraries'));
    }


    public function courses()
    {
        $courses = Course::get();

        return view('user.course', compact('courses'));
    }

    public function registerCourse(Request $request, $id)
    {
        if (auth('student')->user()) {
//            $courseStudent=new CourseStudent();
            $courseStudent = new StudentCourseRegistrationRequest();
            $courseStudent->course_id = $id;
            $courseStudent->student_id = auth('student')->user()->id;
            $courseStudent->status = 'Pending';

            $courseStudent->save();

            $target_course = $this->courseRepository->find($id);


            // todo tested
            $fcm_data = [
                'course_id' => $id
            ];
            $fcm_message = Constants::NEW_COURSE_SUBSCRIPTION_MSG_AR . $target_course->title;
            $fcm_title = Constants::NEW_COURSE_SUBSCRIPTION_TITLE_AR;

            $admins = $this->userRepository->getUsersByRole(1); // admins

            $admins_token = [];
            foreach ($admins as $admin) {
                if ($admin->fcm_token != '0') {
                    array_push($admins_token, $admin->fcm_token); // (logged in) just get a valid fcm_token for admin
                }
            }

            if (!empty($admins_token)) {
//                dd($admins_token);
                $notification = Notifications::addNotification($admins_token, $fcm_title, $fcm_message, $fcm_data);

            }

            $not_data['type'] = 'new_subscription';
            $not_data['fcm_message_en'] = Constants::NEW_COURSE_SUBSCRIPTION_MSG_EN . $target_course->title;
            $not_data['fcm_title_en'] = Constants::NEW_COURSE_SUBSCRIPTION_TITLE_EN;
            $not_data['fcm_message_ar'] = Constants::NEW_COURSE_SUBSCRIPTION_MSG_AR . $target_course->title;
            $not_data['fcm_title_ar'] = Constants::NEW_COURSE_SUBSCRIPTION_TITLE_AR;
            $not_data['fcm_data'] = json_encode($fcm_data);
            $not_data['user_type'] = 'user';
            $not_data['student_id'] = null;


            foreach ($admins as $admin) {
                $not_data['user_id'] = $admin->id;
                $this->notificationRepository->create($not_data);
            }


        }



        $courses = auth('student')->user()->courses;
        return redirect()->route('studentcourses');
    }

    public function studentcourses()
    {
        $courses = [];
        if (auth('student')->user()) {
            $course = auth('student')->user()->courses;
            foreach ($course as $co) {
                $res = StudentCourseRegistrationRequest::where('course_id', $co->id)->where('student_id', auth('student')->user()->id)->first();
                if ($res) {

                    if ($res->status == 'Accept') {
                        $res = Course::find($res->course_id);

                        array_push($courses, $res);
                    }
                }

            }

            //$res =StudentCourseRegistrationRequest::where('student_id',auth('student')->user()->id)->where('status','Accept')->get();

        } elseif (auth('user')->user()) {
            $res = auth('user')->user()->courses;
        }

        return view('user.student-courses', compact('courses'));
    }


    public function coursesRegister()
    {

        $res = StudentCourseRegistrationRequest::where('student_id', auth('student')->user()->id)->where('status', 'Pending')->get();
        $courses = $res;
        return view('user.student-courses-register', compact('courses'));
    }

    public function studentdiplomas()
    {

        $diplomas = auth('student')->user()->courses;
        return view('user.student-diplomas', compact('diplomas'));
    }


    public function coursedetails($id)
    {

        $course = Course::find($id);

        $hours = 0;
        $Ratings = 0;
        $lecs = $course->lectures;

        foreach ($lecs as $lec) {
            $date1 = new DateTime($lec->start_date);
            $date2 = new DateTime($lec->end_date);

            $diff = $date2->diff($date1);

            $hours = $diff->h;
            $hours = $hours + ($diff->days * 24);

        }
        $course_students = CourseStudent::where('course_id', $course->id)->get();

        if (auth('student')->user()) {
            $is_registerd = CourseStudent::where('student_id', auth('student')->user()->id)->where('course_id', $course->id)->get();

        } else {
            $is_registerd = collect([]);
        }

        foreach ($course_students as $item) {
            $Ratings = $Ratings + $item->rating;
        }


        return view('user.course-details', compact('course', 'hours', 'Ratings', 'course_students', 'is_registerd'));
    }

    public function diplomas()
    {
        $diplomas = Diploma::get();


        return view('user.diplomas', compact('diplomas'));
    }


    public function diplomadetails($id)
    {

        $diploma = Diploma::where('id', $id)->first();
        $courses = Course::where('diploma_id', $id)->get();


        return view('user.diploma-details', compact('diploma', 'courses'));
    }

    public function lecturedetails($id)
    {
        $lecture = Lecture::where('id', $id)->first();

        if (auth('student')->user()) {
            if ($lecture->type == 1) {
                $this->studentsPresentSync(auth('student')->user()->id, $lecture->id);
            }
        }

        return view('user.lecture-details', compact('lecture'));
    }


    public function studentsPresentSync($student_id, $lecture_id)
    {

        if (LectureStudent::where('lecture_id', $lecture_id)->where('student_id', $student_id)->first() == null) {
            $res = new LectureStudent();
            $res->lecture_id = $lecture_id;
            $res->student_id = $student_id;
            $res->save();
        }


    }

    public function requestcertificate($diploma_id){

        if(RequestCertificate::where('student_id',auth('student')->user()->id)
       // ->where('course_id',$id)
            ->where('diploma_id',$diploma_id)
            ->first()
        )
        {
            return redirect()->back()->with(['message'=>'لقد قمت بارسال الطلب سابقاً']);
        }

        $res=new RequestCertificate();
        $res->status=1;
        $res->course_id=null;
        $res->diploma_id=$diploma_id;
        $res->student_id=auth('student')->user()->id;
        $res->save();
       // $course= Course::where('id',$id)->first();
    $hours=0;
//    $Ratings=0;
//    $lecs=$course->lectures;
//    foreach($lecs as $lec){
//        $date1 = new DateTime($lec->start_date);
//        $date2 = new DateTime($lec->end_date);
//
//        $diff = $date2->diff($date1);
//
//        $hours = $diff->h;
//        $hours = $hours + ($diff->days*24);
//
//    }
//    $course_students=CourseStudent::where('course_id',$course->id)->get();
//    $is_registerd=CourseStudent::where('student_id',auth('student')->user()->id)->where('course_id',$course->id)->get();

//    foreach($course_students as $item){
//        $Ratings=$Ratings+$item->rating;
//    }


        $diploma =$this->diplomaRepository->find($diploma_id);
        // todo test not
        $fcm_data = [
            'diploma_id' => $diploma_id,
            'student_id' => auth('student')->user()->id
        ];
        $fcm_message = Constants::NEW_CERTIFICATE_REQUEST_MSG_AR . $diploma->title;
        $fcm_title = Constants::NEW_CERTIFICATE_REQUEST_TITLE_AR;

        $admins = $this->userRepository->getUsersByRole(1); // admins

        $admins_token = [];
        foreach ($admins as $admin) {
            if ($admin->fcm_token != '0') {
                array_push($admins_token, $admin->fcm_token); // (logged in) just get a valid fcm_token for admin
            }
        }

        if (!empty($admins_token)) {
            $notification = Notifications::addNotification($admins_token, $fcm_title, $fcm_message, $fcm_data);

        }

        $not_data['type'] = 'certificate_request';
        $not_data['fcm_message_en'] = Constants::NEW_CERTIFICATE_REQUEST_MSG_EN . $diploma->title;
        $not_data['fcm_title_en'] = Constants::NEW_CERTIFICATE_REQUEST_TITLE_EN;
        $not_data['fcm_message_ar'] = Constants::NEW_CERTIFICATE_REQUEST_MSG_AR . $diploma->title;
        $not_data['fcm_title_ar'] = Constants::NEW_CERTIFICATE_REQUEST_TITLE_AR;
        $not_data['fcm_data'] = json_encode($fcm_data);
        $not_data['user_type'] = 'user';
        $not_data['student_id'] = null;


        foreach ($admins as $admin) {
            $not_data['user_id'] = $admin->id;
            $this->notificationRepository->create($not_data);
        }



        return redirect()->back()->with(['message' => 'تم ارسال طلبك بنجاح']);

        //  return view('user.course-details',compact('course','hours','Ratings','course_students','is_registerd'));

    }

}
