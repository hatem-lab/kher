<?php


namespace App\Http\Repository;


use App\Http\IRepositories\IQuestionRepository;
use App\Models\Question;

class QuestionRepository extends BaseRepository implements IQuestionRepository
{

    public function model()
    {
        return Question::class;
    }



}
