<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SurveySeeder extends Seeder
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

        DB::table('surveys')->insert([
            [

                'id' => 1,
                'title' =>'survey 1',
                'desc' =>'survey 1 desc',
                'status' =>1,
                'user_id' => 1,
                'course_id' => 1,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 2,
                'title' =>'survey 2',
                'desc' =>'survey 2 desc',
                'status' =>1,
                'user_id' => 1,
                'course_id' => null,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 3,
                'title' =>'survey 3',
                'desc' =>'survey 3 desc',
                'status' =>1,
                'user_id' => 1,
                'course_id' => null,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 4,
                'title' =>'survey 4',
                'desc' =>'survey 4 desc',
                'status' =>1,
                'user_id' => 1,
                'course_id' => 2,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],

        ]);
    }
}
