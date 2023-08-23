<?php


namespace App\Http\Repository;


use App\Http\IRepositories\IProgressRepository;
use App\Models\Progress;

class ProgressRepository extends BaseRepository implements IProgressRepository
{

    public function model()
    {
        return Progress::class;
    }



}
