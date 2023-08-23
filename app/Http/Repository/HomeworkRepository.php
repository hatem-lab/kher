<?php


namespace App\Http\Repository;


use App\Helpers\JsonResponse;
use App\Http\IRepositories\IHomeworkRepository;
use App\Models\Course;
use App\Models\File;
use App\Models\Homework;
use App\Models\Lecture;
use App\Models\Student;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeworkRepository extends BaseRepository implements IHomeworkRepository
{

    public function model()
    {
        return Homework::class;
    }
    public function getAllHomework($input)
    {

       return  $data = $this->model->orderBy('id','DESC')->get();

    }
    public function createHomework()
    {

        $data['students'] = Student::all();
        $data['teachers']=User::where('role',2)->get();
        $data['lectures']=Lecture::all();
        if ($user=auth('admin') -> user() ->role ==2)
        {
            $data['courses']=auth('admin') -> user()->courses;
        }else
        {
            $data['courses']=Course::all();
        }


        return $data;
    }
    public function showHomework($id)
    {
        $data['homework']=Homework::find($id);
        $data['attachments']=File::where('homework_id',$id)->get();

        if(!$data['homework'])
        {
            return JsonResponse::respondError('there are not homework like this');
        }

        $data['students']= $data['homework'] -> students;
        $data['lectures']=Lecture::all();

        //$data['students'] = Student::all();
        $data['teacher']=$data['homework'] ->user;


        return $data;
    }
    public function storeHomework($request)
    {

        try {
            $homework = new Homework();

            $homework->title=$request['title'];
            $homework-> desc=$request['desc'];
            $homework-> mark=$request['mark'];
            $homework-> status=1;
             $homework->lecture_id=$request['lecture_id'];
            $homework-> user_id=$request['teacher_id'];
            $homework-> course_id=$request['course_id'];
            $homework-> date=$request['date'];
            $homework->save();

            $homework->students()->attach($request['students']);

            return $homework;

        } catch (Exception $e) {
            return redirect()->route('homework.create')->with('error', $e->getMessage());

        }



    }
    public function editHomework($id)
    {

        $data['homework']=Homework::find($id);

        if(!$data['homework'])
        {
            return JsonResponse::respondError('there are not homework like this');
        }

        $data['ids_students']= $data['homework'] -> students -> pluck('id')->toArray();
        $data['lectures']=Lecture::all();
        $data['students'] = Student::all();
        if ($user=auth('admin') -> user() ->role ==2)
        {
            $data['courses']=auth('admin') -> user()->courses;
        }else
        {
            $data['courses']=Course::all();
        }

        $data['teachers']=User::where('role',2)->get();


        return $data;
    }
    public function updateHomework($input, $id)
    {


        try {
            $homework=Homework::find($id);
            if(!$homework)
            {
                return JsonResponse::respondError('there are not homework like this');
            }
            $homework->update([
                'title'=>$input['title'],
                'desc'=>$input['desc'],
                'mark'=>$input['mark'],
               // 'teacher_id'=>$input['teacher_id'],
                'lecture_id'=>$input['lecture_id'],
                'course_id'=>$input['course_id'],
               // 'date'=>$input['date'],

            ]);
            $homework->date=$input['date'];
            $homework->status=$input['status'];

            $homework->user_id=$input['teacher_id'];

            $homework->save();
            $homework->students()->sync($input['students']);

        } catch (Exception $e) {

            return redirect()->route('homework.index')->with('error', $e->getMessage());

        }
    }
    public function deleteHomework($id)
    {

    }


}
