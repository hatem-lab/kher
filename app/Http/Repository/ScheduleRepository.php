<?php


namespace App\Http\Repository;


use App\Http\IRepositories\IScheduleRepository;
use App\Models\Schedule;

class ScheduleRepository extends BaseRepository implements IScheduleRepository
{

    public function model()
    {
        return Schedule::class;
    }


}
