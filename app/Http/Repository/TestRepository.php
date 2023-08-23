<?php


namespace App\Http\Repository;


use App\Http\IRepositories\ITestRepository;
use App\Models\Test;

class TestRepository extends BaseRepository implements ITestRepository
{

    public function model()
    {
        return Test::class;
    }

//    public function getStudentTests($student_id){
//
//    }
}
