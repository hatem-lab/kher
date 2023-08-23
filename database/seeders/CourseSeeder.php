<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
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

        DB::table('courses')->insert([
            [

                'id' => 1,
                'title' =>'quran',
                'desc' =>'quran desc',
                'image' =>'',
                'diploma_id' =>1,
                'testPercentage'=>60,
                'homeworkPercentage'=>30,
                'presencePercentage'=>10,
                'is_finished'=>0,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 2,
                'title' =>'tajwed',
                'desc' =>'tajwed desc',
                'image' =>'',
                'diploma_id' =>1,
                'testPercentage'=>60,
                'homeworkPercentage'=>30,
                'presencePercentage'=>10,
                'is_finished'=>0,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 3,
                'title' =>'hadith',
                'desc' =>'hadith desc',
                'image' =>'',
                'diploma_id' =>2,
                'testPercentage'=>60,
                'homeworkPercentage'=>30,
                'presencePercentage'=>10,
                'is_finished'=>0,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 4,
                'title' =>'reading',
                'desc' =>'reading desc',
                'image' =>'',
                'diploma_id' =>3,
                'testPercentage'=>60,
                'homeworkPercentage'=>30,
                'presencePercentage'=>10,
                'is_finished'=>0,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],

        ]);
    }
}
