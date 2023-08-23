<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LectureSeeder extends Seeder
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

        DB::table('lectures')->insert([
            [

                'id' => 1,
                'type' =>1,
                'title' =>'lecture 1',

                'desc' => 'lecture 1 desc',
                'link' => 'www.example1.com',
                'start_date' => '2022-01-08 01:07:50',
                'end_date' => '2022-01-08 04:07:50',
                'course_id' => 1,

                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 2,
                'type' =>0,
                'title' =>'lecture 2',

                'desc' => 'lecture 2 desc',
                'link' => null,
                'start_date' => '2022-01-07 15:00:00',
                'end_date' => '2022-01-07 17:00:00',
                'course_id' => 1,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 3,
                'type' =>1,
                'title' =>'lecture 3',

                'desc' => 'lecture 3 desc',
                'link' => 'www.example3.com',
                'start_date' => '2022-02-07 15:00:00',
                'end_date' => '2022-02-07 16:00:00',
                'course_id' => 2,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 4,
                'type' =>0,
                'title' =>'lecture 4',

                'desc' => 'lecture 4 desc',
                'link' => null,
                'start_date' => '2022-01-07 12:00:00',
                'end_date' => '2022-01-07 15:00:00',
                'course_id' => 2,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],

        ]);
    }
}
