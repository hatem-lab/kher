<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomeworkSeeder extends Seeder
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

        DB::table('homework')->insert([
            [

                'id' => 1,
                'title' =>'HW 1',
                'desc' =>'HW 1 desc',
                'mark'=>50,
                'status'=>'1',
                'user_id' => 3,
                'course_id' => 1,
                'lecture_id' => 1,

                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 2,
                'title' =>'HW 2',
                'desc' =>'HW 2 desc',
                'mark'=>50,
                'status'=>'1',
                'user_id' => 1,
                'course_id' => 1,
                'lecture_id' => 1,

                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 3,
                'title' =>'HW 3',
                'desc' =>'HW 3 desc',
                'mark'=>50,
                'status'=>'1',
                'user_id' => 2,
                'course_id' => 1,
                'lecture_id' => 2,

                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 4,
                'title' =>'HW 4',
                'desc' =>'HW 4 desc',
                'mark'=>50,
                'status'=>'1',
                'user_id' => 3,
                'course_id' => 1,
                'lecture_id' => 3,

                'created_at' =>now(),
                'updated_at' =>now(),
            ],

        ]);
    }
}
