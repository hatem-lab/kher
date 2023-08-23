<?php


namespace App\Http\Repository;


use App\Http\IRepositories\IStudentRepository;
use App\Models\Certificate;
use App\Models\Course;
use App\Models\Lecture;
use App\Models\Profile;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StudentRepository extends BaseRepository implements IStudentRepository
{

    public function model()
    {
        return Student::class;
    }

    public function getStudents()
    {
        try {
            $data['students']= $this->model->where('status', '!=' , 0)
                ->get();

            $data['courses']=Course::all();

            return $data;
        } catch (\Exception $exception) {
            throw new \Exception('common_msg.' . trans($exception->getMessage()));
        }
    }
    public function showStudet($id)
    {
        return  Student::find($id);
        // TODO: Implement showStudet() method.
    }

    public function createStudent()
    {
      return  $certificate=Certificate::all();

    }
    public function storeStudent($input)
    {
        try {
            $input = $input->all();
            $input['password'] = Hash::make($input['password']);
            $student =$this->model->create($input);
            $student->email_verified_at=1;
            $student->save();
            if($student){
                $profile = new Profile();
                $profile->phone ='';
                $profile->student_id = $student->id;
                $profile->save();
            }
           return $student;

        } catch (\Exception $exception) {
            throw new \Exception('common_msg.' . trans($exception->getMessage()));
        }


    }

    public function ShowStudent($id)
    {
        try {
            $data=Student::find($id);
            return  $data;

        } catch (\Exception $exception) {
            throw new \Exception('common_msg.' . trans($exception->getMessage()));
        }


    }

    public function editStudent($id)
    {
        try {
            $data['student']=Student::find($id);
            $data['certificate']=Certificate::all();
            return  $data;

        } catch (\Exception $exception) {
            throw new \Exception('common_msg.' . trans($exception->getMessage()));
        }


    }




    public function updateStudent($input, $id)
    {
        try {
        $student = Student::find($id);
        $input = $input->all();
        if(!empty($input['password'])){

            $validator = Validator::make($input, [
                'password' => 'required|min:6',
                'confirm-password' =>'required_with:password|same:password'
            ]);

            if($validator->passes()) {
                $input['password'] = Hash::make($input['password']);
            }

        }else{
            $input['password']=$student->password;
        }
        $student->update($input);

        } catch (\Exception $exception) {
            throw new \Exception('common_msg.' . trans($exception->getMessage()));
        }

    }

    public function deleteStudent($input)
    {
        try {

         $student=Student::find($input->student_id);
         return $student->delete();
        } catch (\Exception $exception) {
            throw new \Exception('common_msg.' . trans($exception->getMessage()));
        }
    }

    public function getStudentByStatus($status)
    {
        try {

            $students = $this->model->where('status', $status)
                ->orderBy('created_at', 'desc')->get();

            return $students;
        } catch (\Exception $exception) {
            throw new \Exception('common_msg.' . trans($exception->getMessage()));
        }
    }




}
