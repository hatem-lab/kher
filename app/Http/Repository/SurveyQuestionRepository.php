<?php


namespace App\Http\Repository;


use App\Http\IRepositories\ISurveyQuestionRepository;
use App\Models\SurveyQuestion;

class SurveyQuestionRepository extends BaseRepository implements ISurveyQuestionRepository
{

    public function model()
    {
        return SurveyQuestion::class;
    }


}
