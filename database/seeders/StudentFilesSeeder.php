<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentFilesSeeder extends Seeder
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

        DB::table('student_files')->insert([
            [

                'id' => 1,
                'path' =>'',
                'mark'=>50,
                'homework_id' =>1,
                'student_id' =>1,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 2,
                'path' =>'',
                'mark'=>50,
                'homework_id' =>1,
                'student_id' =>2,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 3,
                'path' =>'',
                'mark'=>50,
                'homework_id' =>2,
                'student_id' =>3,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 4,
                'path' =>'',
                'mark'=>50,
                'homework_id' =>2,
                'student_id' =>4,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],

        ]);
    }
}
