<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
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

        DB::table('questions')->insert([
            [

                'id' => 1,
                'title' =>'first',
                'desc' =>'question 1',
                'image' =>'',
                'mark' => 10,
                'question_type_id' => 1,
                'test_id' =>1,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 2,
                'title' =>'second',
                'desc' =>'question 2',
                'image' =>'',
                'mark' => 5,
                'question_type_id' => 2,
                'test_id' =>1,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 3,
                'title' =>'third',
                'desc' =>'question 3',
                'image' =>'',
                'mark' => 15,
                'question_type_id' => 3,
                'test_id' =>1,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 4,
                'title' =>'forth',
                'desc' =>'question 4',
                'image' =>'',
                'mark' => 20,
                'question_type_id' => 4,
                'test_id' =>1,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 5,
                'title' =>'fifth',
                'desc' =>'question 5',
                'image' =>'/images/admin/questions/questionImage_1645789023_81J5r9dANGL._SL1500_.jpg',
                'mark' => 20,
                'question_type_id' => 1,
                'test_id' =>1,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],

        ]);
    }
}
