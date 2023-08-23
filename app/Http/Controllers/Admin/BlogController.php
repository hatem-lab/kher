<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\JsonResponse;
use App\Helpers\Mapper;
use App\Http\Controllers\Controller;
use App\Http\IRepositories\IBlogRepository;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\Diploma;
use App\Models\File;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    protected $blogRepository;
    protected $requestData;
    public function __construct(IBlogRepository  $blogRepository)
    {
        $this->requestData = Mapper::toUnderScore(Request()->all());
        $this->middleware('permission:blogs');
        $this->middleware('permission:list blogs')->only(['index']);
        $this->middleware('permission:create blog')->only(['create']);
        $this->middleware('permission:update blog')->only(['edit']);
        $this->blogRepository = $blogRepository;

    }


    public function record()
    {

        $blogs=Blog::where('status',0)->where('is_reject',0)->orderBy('created_at')->get();
        return view('admin.blogs.records',compact('blogs'));
    }

    public function index()
    {
        if (auth('admin') ->user()->role===1)
        {
            $blogs=Blog::where('status','<>',0)->where('is_reject',0)->orderBy('created_at')->get();
        }else{
            $blogs=Blog::where('status','<>',0)->where('is_reject',0)->where('user_id',auth('admin') ->user()->id)->orderBy('created_at')->get();
        }

//     foreach ($blogs as $one)
//     {
//
//         foreach ($one->comments as  $comment)
//         {
//             foreach ($comment->replies as  $reply)
//             {
//                 dd($reply->id);
//             }
//
//         }
//
//     }

        return view('admin.blogs.list',compact('blogs'));
    }

    public function create()
    {

        return view('admin.blogs.add');
    }

    public function store(Request $request)
    {
        $data = $this->requestData;

        try {
            $validator = Validator::make($data, $validator_rules = Blog::create_update_rules);
            if ($validator->passes())
            {
                $blog= Blog::create([
                    'title'=>$request['title'],
                    'desc'=>$request['desc'],
                    'user_id'=>auth('admin') ->user() ->id,
                    'status'=>auth('admin') ->user() ->role ===1 ? 1 : 0,
                ]);

                if( $request->hasFile('file'))
                {
                    $image = $request->file('file');
                    $blog->update(['image'=>$image->getClientOriginalName()]);
                    // move pic
                    $imageName = $request->file->getClientOriginalName();
                    $request->file->move(public_path('Blogs/' . $blog->id), $imageName);
                }
                return redirect()->route('blogs.index')
                    ->with('success','Blog has Added Successfully');
            }
            else
            {
                return redirect()->route('blog.create')->with('error', trans('general.Operation_Failed'));

            }

        } catch (Exception $e) {

            return redirect()->route('blogs.index')->with('error', $e->getMessage());

        }

    }
    public function edit($id)
    {
       // $this->middleware('permission:update blog');
       $data= $this->blogRepository->editBlog($id);
        return view('admin.blogs.edit',compact('data'));
    }


    public function update(Request $request, $id)
    {
        $this->blogRepository->updateBlog($request,$id);
        return redirect()->route('blogs.index')
            ->with('edit','Blog information has updated successfully');
    }


    public function destroy($id)
    {
        try {
            $blog=Blog::find($id);
            $blog->delete();
            return JsonResponse::respondSuccess(trans('common_msg.' . JsonResponse::MSG_DELETED_SUCCESSFULLY));
        } catch (Exception $ex) {
            return JsonResponse::respondError($ex->getMessage());
        }

    }

    public function block($id)
    {

        try {
            $blog=Blog::find($id);
           if($blog->status ==1)
           {
               $blog->status=2;
               $blog->save();
           }elseif($blog->status ==2)
               $blog->status=1;
               $blog->save();
            return response()->json([
                'status' => 200,
                'block'=>$blog->status,
                'content' => $blog->status ==2 ? 'الغاء الحجب' : 'حجب'
            ]);
            //return JsonResponse::respondSuccess(trans('common_msg.' . JsonResponse::MSG_DELETED_SUCCESSFULLY));
        } catch (Exception $ex) {
            return JsonResponse::respondError($ex->getMessage());
        }

    }

    public function accept($id)
    {
        try {
            $blog=Blog::find($id);
           $blog->status=1;
            $blog->save();
            return JsonResponse::respondSuccess(trans('common_msg.' . JsonResponse::MSG_DELETED_SUCCESSFULLY));
        } catch (Exception $ex) {
            return JsonResponse::respondError($ex->getMessage());
        }

    }

    public function reject($id)
    {
        try {
            $blog=Blog::find($id);
            $blog->is_reject=1;
            $blog->save();
            return JsonResponse::respondSuccess(trans('common_msg.' . JsonResponse::MSG_DELETED_SUCCESSFULLY));
        } catch (Exception $ex) {
            return JsonResponse::respondError($ex->getMessage());
        }

    }

    public function saveImage(Request $request)
    {
        try {

            $image = $request->file('file');
            $blog=Blog::find($request->id);
            $blog->update(['image'=>$image->getClientOriginalName()]);
            // move pic
            $imageName = $request->file->getClientOriginalName();
            $request->file->move(public_path('Blogs/' . $request->id), $imageName);
            $view = view('admin.blogs._showlist')->with(['blog' => $blog])
                ->renderSections();

            return response()->json([
                'status' => true,
                'content' => $view['main']
            ]);


        } catch (Exception $ex) {
            return JsonResponse::respondError($ex->getMessage());
        }

    }

    public function destroy_file(Request $request,$id)
    {
        try {
            $blog = Blog::findOrFail($id);
            $path=$blog->image;
            $blog->image=null;
            $blog->save();
            Storage::disk('public_uploads')->delete($blog->id.'/'.$path);
            return JsonResponse::respondSuccess(trans('common_msg.' . JsonResponse::MSG_DELETED_SUCCESSFULLY));

        } catch (Exception $ex) {
            return JsonResponse::respondError($ex->getMessage());
        }


    }

    public function destroy_comment(Request $request,$id)
    {
//        return  response()->json(['data'=>$id]);
        try {
            $comment = Comment::findOrFail($id);
            $comment->delete();
            return JsonResponse::respondSuccess(trans('common_msg.' . JsonResponse::MSG_DELETED_SUCCESSFULLY));

        } catch (Exception $ex) {
            return JsonResponse::respondError($ex->getMessage());
        }


    }


}
