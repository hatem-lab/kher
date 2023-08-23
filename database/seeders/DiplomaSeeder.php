<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiplomaSeeder extends Seeder
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

        DB::table('diplomas')->insert([
            [

                'id' => 1,
                'title' =>'quran diploma',
                'title_en' =>'quran diploma',
                'desc' =>'quran diploma desc',
                'image' =>'',
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 2,
                'title' =>'hadith diploma',
                'title_en' =>'hadith diploma',
                'desc' =>'tajwed diploma desc',
                'image' =>'',
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 3,
                'title' =>'fikh diploma',
                'title_en' =>'fikh diploma',

                'desc' =>'fikh diploma desc',
                'image' =>'',
                'created_at' =>now(),
                'updated_at' =>now(),
            ],


        ]);
    }
}
