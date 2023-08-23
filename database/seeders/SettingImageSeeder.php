<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingImageSeeder extends Seeder
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

        DB::table('setting_images')->insert([
            [

                'id' => 1,
                'type' =>'slider_1',
                'name' =>'image 1',
                'path' =>'',
                'caption' =>'lorem 1',
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 2,
                'type' =>'slider_2',
                'name' =>'image 2',
                'path' =>'',
                'caption' =>'lorem 2',
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 3,
                'type' =>'slider_3',
                'name' =>'image 2',
                'path' =>'',
                'caption' =>'lorem 3',
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 4,
                'type' =>'slider_4',
                'name' =>'image 4',
                'path' =>'',
                'caption' =>'lorem 4',
                'created_at' =>now(),
                'updated_at' =>now(),
            ],

        ]);
    }
}
