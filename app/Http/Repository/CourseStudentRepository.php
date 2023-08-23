<?php


namespace App\Http\Repository;


use App\Http\IRepositories\ICourseStudentRepository;
use App\Models\CourseStudent;

class CourseStudentRepository extends BaseRepository implements ICourseStudentRepository
{

    public function model()
    {
        return CourseStudent::class;
    }

    public function getSubscriptionsByStatus($status)
    {
        try {

            $subscriptions = $this->model->where('status', $status)->orderBy('created_at', 'desc')->get();
            return $subscriptions;
        } catch (\Exception $exception) {
            throw new \Exception('common_msg.' . trans($exception->getMessage()));
        }
    }
}
