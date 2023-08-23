<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestSeeder extends Seeder
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

        DB::table('tests')->insert([
            [

                'id' => 1,
                'title' =>'test 1',
                'desc' =>'test 1 desc',
                'date' => now(),
                'duration' => 60,
                'status' =>1,
                'weight' =>2,
                'course_id' => 1,
                'user_id' => 3,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 2,
                'title' =>'test 2',
                'desc' =>'test 2 desc',
                'date' => now(),
                'duration' => 120,
                'status' =>0,
                'weight' =>1,
                'course_id' => 2,
                'user_id' => 3,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 3,
                'title' =>'test 3',
                'desc' =>'test 3 desc',
                'date' => now(),
                'duration' => 45,
                'status' =>0,
                'weight' =>1,
                'course_id' => 3,
                'user_id' => 3,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 4,
                'title' =>'test 4',
                'desc' =>'test 4 desc',
                'date' => now(),
                'duration' => 70,
                'status' =>1,
                'weight' =>1,
                'course_id' => 4,
                'user_id' => 3,

                'created_at' =>now(),
                'updated_at' =>now(),
            ],

        ]);
    }
}
