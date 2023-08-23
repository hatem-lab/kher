<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FileSeeder extends Seeder
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

        DB::table('files')->insert([
            [

                'id' => 1,
                'type' =>0,
                'name' =>'lecture 1 file',
                'path' =>'',
                'homework_id' => null,
                'lecture_id' => 1,

                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 2,
                'type' =>0,
                'name' =>'lecture 2 file',
                'path' =>'',
                'homework_id' => null,
                'lecture_id' => 2,

                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 3,
                'type' =>1,
                'name' =>'HW 1 file',
                'path' =>'',
                'homework_id' => 1,
                'lecture_id' => null,

                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 4,
                'type' =>1,
                'name' =>'HW 2 file',
                'path' =>'',
                'homework_id' => 2,
                'lecture_id' => null,

                'created_at' =>now(),
                'updated_at' =>now(),
            ],

        ]);
    }
}
