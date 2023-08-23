<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SurveyQuestionSeeder extends Seeder
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

        DB::table('survey_questions')->insert([
            [

                'id' => 1,
                'desc' =>'survey question 1',
                'question_type_id' => 1,
                'survey_id' =>1,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 2,
                'desc' =>'survey question 2',
                'question_type_id' => 2,
                'survey_id' =>2,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 3,
                'desc' =>'survey question 3',
                'question_type_id' => 3,
                'survey_id' =>2,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 4,
                'desc' =>'survey question 4',
                'question_type_id' => 4,
                'survey_id' =>2,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],

        ]);
    }
}
