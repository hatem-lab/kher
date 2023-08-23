<?php


namespace App\Http\Repository;



use App\Http\IRepositories\ISurveyRepository;
use App\Models\Survey;

class SurveyRepository extends BaseRepository implements ISurveyRepository
{

    public function model()
    {
        return Survey::class;
    }

    public function getPublicSurveys()
    {
        try {

            $data = $this->model->where('course_id', null)->get();



            return $data;
        } catch (\Exception $exception) {
            throw new \Exception('common_msg.' . trans($exception->getMessage()));
        }
    }

    public function getSurveysForStudent($course_ids)
    {
        try {

            $data = $this->model->whereIn('course_id', $course_ids)
                ->OrWhere('course_id', null)
                ->get();



            return $data;
        } catch (\Exception $exception) {
            throw new \Exception('common_msg.' . trans($exception->getMessage()));
        }
    }

}
