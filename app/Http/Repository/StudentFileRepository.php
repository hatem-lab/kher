<?php


namespace App\Http\Repository;


use App\Http\IRepositories\IStudentFileRepository;
use App\Models\StudentFile;

class StudentFileRepository extends BaseRepository implements IStudentFileRepository
{

    public function model()
    {
        return StudentFile::class;
    }


}
