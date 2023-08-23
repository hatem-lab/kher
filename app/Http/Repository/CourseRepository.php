<?php


namespace App\Http\Repository;


use App\Http\IRepositories\ICourseRepository;
use App\Models\Course;

class CourseRepository extends BaseRepository implements ICourseRepository
{

    public function model()
    {
        return Course::class;
    }

    public function showCourse($id)
    {
       return  Course::find($id);

    }

}
