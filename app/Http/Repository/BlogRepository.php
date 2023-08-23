<?php


namespace App\Http\Repository;


use App\Helpers\JsonResponse;
use App\Http\IRepositories\IBlogRepository;
use App\Models\Blog;
use App\Models\Homework;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

class BlogRepository extends BaseRepository implements IBlogRepository
{

    public function model()
    {
        return Blog::class;
    }
    public function editBlog($id)
    {
       return $data=Blog::find($id);

    }
    public function updateBlog($request, $id)
    {
        try {
            $blog=Blog::find($id);
            if(!$blog)
            {
                return JsonResponse::respondError('there are not blog like this');
            }
            $blog->update([
                'title'=>$request['title'],
                'desc'=>$request['desc'],
            ]);
        } catch (\Exception $e) {

            return redirect()->route('blogs.index')->with('error', $e->getMessage());

        }
    }



}
