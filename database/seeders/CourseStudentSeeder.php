<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseStudentSeeder extends Seeder
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

        DB::table('course_students')->insert([
            [

                'id' => 1,
                'course_id' =>1,
                'student_id' =>1,
                'rating' =>4,
                'resultant'=>50,
                'status' =>1,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 2,
                'course_id' =>1,
                'student_id' =>2,
                'resultant'=>50,
                'rating' =>1.5,
                'status' =>0,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 3,
                'course_id' =>2,
                'student_id' =>3,
                'resultant'=>50,
                'rating' =>2.5,
                'status' =>1,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 4,
                'course_id' =>3,
                'student_id' =>4,
                'resultant'=>50,
                'rating' =>3,
                'status' =>0,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],

        ]);
    }
}
