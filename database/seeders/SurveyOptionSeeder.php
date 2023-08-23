<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SurveyOptionSeeder extends Seeder
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

        DB::table('survey_options')->insert([
            [

                'id' => 1,
                'desc' =>'option 1',
                'survey_question_id' =>3,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 2,
                'desc' =>'option 2',
                'survey_question_id' =>3,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 3,
                'desc' =>'option 3',
                'survey_question_id' =>4,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 4,
                'desc' =>'option 4',
                'survey_question_id' =>4,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],

        ]);
    }
}
