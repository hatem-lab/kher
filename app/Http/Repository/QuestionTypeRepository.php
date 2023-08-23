<?php


namespace App\Http\Repository;


use App\Http\IRepositories\IQuestionTypeRepository;
use App\Models\Question_type;

class QuestionTypeRepository extends BaseRepository implements IQuestionTypeRepository
{

    public function model()
    {
        return Question_type::class;
    }



}
