<?php


namespace App\Http\Repository;


use App\Http\IRepositories\ISurveyOptionRepository;
use App\Models\SurveyOption;

class SurveyOptionRepository extends BaseRepository implements ISurveyOptionRepository
{

    public function model()
    {
        return SurveyOption::class;
    }

}
