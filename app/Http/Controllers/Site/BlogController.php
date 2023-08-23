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
use App\Models\Comment;
use App\Models\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;

class BlogController extends Controller
{


    protected $userRepository;
    protected $notificationRepository;

    public function __construct(IUserRepository $userRepository,
                                INotificationRepository $notificationRepository)
    {

        $this->userRepository = $userRepository;
        $this->notificationRepository = $notificationRepository;

    }


    public function  GetAllBlogs()
    {

        $blogs=Blog::where('status',1)->where('is_reject',0)->orderBy('created_at')->paginate(3);
        return view('user.blog',compact('blogs'));
    }
    public function  GetBlogDetails($id)
    {
        $blog=Blog::find($id);
       return view('user.blog-details',compact('blog'));
    }

    public function Commentstore(Request $request)
    {

        if($request->desc  == null)
        {
            return back();
        }

        if(auth('user') -> user())
        {

            $comment = new Comment();
            $comment->desc=$request->desc;
            $comment->parent_id=null;
            $comment->blog_id=$request->blog_id;
            $comment->user_id=auth('user') -> user() ->id;
            $comment->save();
            return back();
        }elseif(auth('student') -> user())
        {
            $comment = new Comment();
            $comment->desc=$request->desc;
            $comment->parent_id=null;
            $comment->blog_id=$request->blog_id;
            $comment->student_id=auth('student') -> user() ->id;
            $comment->save();

            // todo tested
            $fcm_data = [
                'blog_id' => $comment->blog->id,
                'student_id' => auth('student') -> user()->id
            ];
            $fcm_message = Constants::NEW_COMMENT_MSG_AR . $comment->blog->title;
            $fcm_title = Constants::NEW_COMMENT_TITLE_AR;

            $admin_id = $comment->blog->user_id; // publisher
            $admin = $this->userRepository->find($admin_id);
//            dd($admin);

            $admin_token = $admin->fcm_token;

            if (isset($admin_token) && $admin_token != '0' ) {
                $notification = Notifications::addNotification($admin_token, $fcm_title, $fcm_message, $fcm_data);

            }

            $not_data['type'] = 'new_comment';
            $not_data['fcm_message_en'] = Constants::NEW_COMMENT_MSG_EN . $comment->blog->title;
            $not_data['fcm_title_en'] = Constants::NEW_COMMENT_TITLE_EN;
            $not_data['fcm_message_ar'] = Constants::NEW_COMMENT_MSG_AR . $comment->blog->title;
            $not_data['fcm_title_ar'] = Constants::NEW_COMMENT_TITLE_AR;
            $not_data['fcm_data'] = json_encode($fcm_data);
            $not_data['user_type'] = 'user';
            $not_data['student_id'] = null;
            $not_data['user_id'] = $admin->id;


            $this->notificationRepository->create($not_data);





            return back();
        }else
        {
            return back();

        }
    }


    public function store(Request $request)
    {
        if($request->desc  == null)
        {
            return back();
        }
       if(auth('user') -> user())
       {
           $comment = new Comment();
           $comment->desc=$request->desc;
           $comment->parent_id=$request->parent_id;
           $comment->blog_id=$request->blog_id;
           $comment->user_id=auth('user') -> user() ->id;
           $comment->save();
           return back();
       }elseif(auth('student') -> user())
       {
           $comment = new Comment();
           $comment->desc=$request->desc;
           $comment->parent_id=$request->parent_id;
           $comment->blog_id=$request->blog_id;
           $comment->student_id=auth('student') -> user() ->id;
           $comment->save();

           // todo tested
           $fcm_data = [
               'blog_id' => $comment->blog->id,
               'student_id' => auth('student') -> user()
           ];
           $fcm_message = Constants::NEW_COMMENT_MSG_AR . $comment->blog->title;
           $fcm_title = Constants::NEW_COMMENT_TITLE_AR;

           $admin_id = $comment->blog->user_id; // publisher
           $admin = $this->userRepository->find($admin_id);

           $admin_token = $admin->fcm_token;

           if (isset($admin_token) && $admin_token != '0') {
               $notification = Notifications::addNotification($admin_token, $fcm_title, $fcm_message, $fcm_data);

           }

           $not_data['type'] = 'new_comment';
           $not_data['fcm_message_en'] = Constants::NEW_COMMENT_MSG_EN . $comment->blog->title;
           $not_data['fcm_title_en'] = Constants::NEW_COMMENT_TITLE_EN;
           $not_data['fcm_message_ar'] = Constants::NEW_COMMENT_MSG_AR . $comment->blog->title;
           $not_data['fcm_title_ar'] = Constants::NEW_COMMENT_TITLE_AR;
           $not_data['fcm_data'] = json_encode($fcm_data);
           $not_data['user_type'] = 'user';
           $not_data['student_id'] = null;
           $not_data['user_id'] = $admin->id;


           $this->notificationRepository->create($not_data);


           return back();
       }else
       {
           return back();

       }

    }

}
