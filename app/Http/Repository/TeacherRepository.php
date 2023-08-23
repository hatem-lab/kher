<?php


namespace App\Http\Repository;


use App\Http\IRepositories\ITeacherRepository;
use App\Models\User;

class TeacherRepository extends BaseRepository implements ITeacherRepository
{

    public function model()
    {
        return User::class;
    }
    public function getAllTeachers($request)
    {

        $data = User::where('role',2)->orderBy('id','DESC')->get();
        return view('admin.teachers.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);

    }



}
