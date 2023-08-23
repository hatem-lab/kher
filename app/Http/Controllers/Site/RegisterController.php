<?php

namespace App\Http\Controllers\Site;

use App\Helpers\Constants;
use App\Helpers\Notifications;
use App\Http\Controllers\Controller;
use App\Http\IRepositories\INotificationRepository;
use App\Http\IRepositories\IUserRepository;
use App\Http\Services\VerificationServices;
use App\Mail\NewMail;
use App\Mail\VerificationCenterMail;
use App\Mail\VerificationMail;
use App\Models\Blog;
use App\Models\Certificate;
use App\Models\Course;
use App\Models\Profile;
use App\Models\Student;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

//    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    protected $userRepository;
    protected $notificationRepository;
    public $sms_services;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(VerificationServices $sms_services,
                                IUserRepository $userRepository,
                                INotificationRepository $notificationRepository)
    {
        $this->middleware('guest');
        $this->userRepository = $userRepository;
        $this->notificationRepository = $notificationRepository;

        $this -> sms_services = $sms_services;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
//    protected function validator(array $data)
//    {
//        return Validator::make($data, [
//            'name' => ['required', 'string', 'max:255'],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//            'password' => ['required', 'string', 'min:8', 'confirmed'],
//        ]);
//    }

    protected function register()
    {
        $certificate=Certificate::all();
        return view('user.register',compact('certificate'));
    }

    protected function create(Request $request)
    {
        try {
            if($request->password == null)
            {
                return redirect()->back()->with(['error','need password']);
            }


          //  DB::beginTransaction();
            $verification = [];
            $user= Student::create([
                'name_en' => $request->name_en,
                'name_ar' => $request->name_ar,
                'username' => $request->name_en,
                'certificate_id' => $request->certificate_id,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            if($user)
            {
                $profile=new Profile();
                $profile->phone=$request->phone;
                $profile->address=$request->address;
                $profile->student_id=$user->id;
                $profile->save();
            }
            $id=$user->id;

            Student::whereId($id) -> update(['email_verified_at' => now()]);


            $verification['user_id'] = $user->id;
            $verification_data =  $this->sms_services->setVerificationCode($verification);
            $message = $this->sms_services->getSMSVerifyMessageByAppName($verification_data -> code );
            $email_from='khire@gmail.com';
            $to_email =$user->email ;
            $details['name']=$user->name_ar;
            $details['body']=$message;
            $details['email']=$email_from;

            Mail::to($user->email)->send(new VerificationMail($details));

//            $data = array('name'=>$user->name_ar, "body" => $message,"email"=>$email_from );
//            Mail::send('emails', $data,function($message) use ( $email_from,$to_email) {
//                $message->to($to_email)->subject('Verification Mail');
//               $message->from($email_from);
//            });

        //    DB::commit();
           // auth()->guard('student')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")]) ;
               //return redirect()->route('get.verification.form');

            // todo tested
//            $fcm_data = [
//                'student_id' => $user->id
//            ];
//            $fcm_message = Constants::NEW_STUDENT_REGISTER_MSG_AR . $user->name_ar;
//            $fcm_title = Constants::NEW_STUDENT_REGISTER_TITLE_AR;
//
//            $admins = $this->userRepository->getUsersByRole(1); // admins
//
//            $admins_token = [];
//            foreach ($admins as $admin) {
//                if ($admin->fcm_token != '0') {
//                    array_push($admins_token, $admin->fcm_token); // (logged in) just get a valid fcm_token for admin
//                }
//            }
//
//            if (!empty($admins_token)) {
//                $notification = Notifications::addNotification($admins_token, $fcm_title, $fcm_message, $fcm_data);
//
//            }
//
//            $not_data['type'] = 'new_register';
//            $not_data['fcm_message_en'] = Constants::NEW_STUDENT_REGISTER_MSG_EN . $user->name_ar;
//            $not_data['fcm_title_en'] = Constants::NEW_STUDENT_REGISTER_TITLE_EN;
//            $not_data['fcm_message_ar'] = Constants::NEW_STUDENT_REGISTER_MSG_AR . $user->name_ar;
//            $not_data['fcm_title_ar'] = Constants::NEW_STUDENT_REGISTER_TITLE_AR;
//            $not_data['fcm_data'] = json_encode($fcm_data);
//            $not_data['user_type'] = 'user';
//            $not_data['student_id'] = null;
//
//
//            foreach ($admins as $admin) {
//                $not_data['user_id'] = $admin->id;
//                $this->notificationRepository->create($not_data);
//            }


            //return view('auth.verification',compact('user')) ;
            auth()->guard('user')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")]);
            return redirect()->route('site.home');
        }catch(\Exception $ex){
              dd($ex);
            return redirect()->back()->with(['error',$ex->getMessage()]);
            //DB::rollback();
        }

    }





}
