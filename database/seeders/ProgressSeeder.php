<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgressSeeder extends Seeder
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

        DB::table('progress')->insert([
            [

                'id' => 1,
                'mark' =>70,
                'pass_status' =>1,
                'student_id' => 1,
                'course_id' => 1,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 2,
                'mark' =>50,
                'pass_status' =>0,
                'student_id' => 2,
                'course_id' => 1,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 3,
                'mark' =>80,
                'pass_status' =>1,
                'student_id' => 3,
                'course_id' => 2,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 4,
                'mark' =>30,
                'pass_status' =>0,
                'student_id' => 4,
                'course_id' => 2,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],

        ]);
    }
}
