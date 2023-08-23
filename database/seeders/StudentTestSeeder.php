<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentTestSeeder extends Seeder
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

        DB::table('student_tests')->insert([
            [

                'id' => 1,
                'total_mark' =>50,
                'test_id' =>1,
                'student_id' =>1,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 2,
                'total_mark' =>20,
                'test_id' =>1,
                'student_id' =>2,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 3,
                'total_mark' =>70,
                'test_id' =>2,
                'student_id' =>3,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 4,
                'total_mark' =>60,
                'test_id' =>2,
                'student_id' =>4,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],

        ]);
    }
}
