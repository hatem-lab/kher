<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Model::unguard();

        DB::table('schedules')->insert([
            [

                'id' => 1,
                'start_date' =>'2022-01-08 01:07:50',
                'end_date' =>'2022-01-08 04:07:50',
                'lecture_id' => 1,
                'student_id' => 1,
                'user_id' =>3,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 2,
                'start_date' =>'2022-01-08 01:07:50',
                'end_date' =>'2022-01-08 04:07:50',
                'lecture_id' => 1,
                'student_id' => 2,
                'user_id' =>3,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 3,
                'start_date' =>'2022-01-07 15:00:00',
                'end_date' =>'2022-01-07 17:00:00',
                'lecture_id' => 2,
                'student_id' => 3,
                'user_id' =>3,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 4,
                'start_date' =>'2022-01-07 15:00:00',
                'end_date' =>'2022-01-07 17:00:00',
                'lecture_id' => 2,
                'student_id' => 4,
                'user_id' =>3,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],


        ]);
    }
}
