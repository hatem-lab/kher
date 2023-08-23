<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionTypeSeeder extends Seeder
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

        DB::table('question_types')->insert([
            [

                'id' => 1,
                'type' =>1,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 2,
                'type' =>2,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 3,
                'type' =>3,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 4,
                'type' =>4,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],

        ]);
    }
}
