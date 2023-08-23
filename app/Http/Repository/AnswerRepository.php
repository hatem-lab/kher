<?php


namespace App\Http\Repository;


use App\Http\IRepositories\IAnswerRepository;
use App\Models\Answer;

class AnswerRepository extends BaseRepository implements IAnswerRepository
{

    public function model()
    {
        return Answer::class;
    }

}
