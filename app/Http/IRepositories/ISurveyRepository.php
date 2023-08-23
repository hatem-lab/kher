<?php


namespace App\Http\IRepositories;


interface ISurveyRepository
{
    public function getPublicSurveys();

    public function getSurveysForStudent($course_ids);
}
