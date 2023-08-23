<?php


namespace App\Http\Repository;


use App\Http\IRepositories\ISurveyAnswerRepository;
use App\Models\SurveyAnswer;

class SurveyAnswerRepository extends BaseRepository implements ISurveyAnswerRepository
{

    public function model()
    {
        return SurveyAnswer::class;
    }

}
