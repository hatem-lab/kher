<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptionSeeder extends Seeder
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

        DB::table('options')->insert([
            [

                'id' => 1,
                'desc' =>'option 1',
                'question_id' =>3,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 2,
                'desc' =>'option 2',
                'question_id' =>3,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 3,
                'desc' =>'option 3',
                'question_id' =>3,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 4,
                'desc' =>'choice 1',
                'question_id' =>4,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 5,
                'desc' =>'choice 2',
                'question_id' =>4,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 6,
                'desc' =>'choice 3',
                'question_id' =>4,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],

        ]);
    }
}
