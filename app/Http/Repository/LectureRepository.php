<?php


namespace App\Http\Repository;


use App\Http\IRepositories\ILectureRepository;
use App\Models\Lecture;

class LectureRepository extends BaseRepository implements ILectureRepository
{

    public function model()
    {
        return Lecture::class;
    }

}
