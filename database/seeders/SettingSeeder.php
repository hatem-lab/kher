<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
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

        DB::table('settings')->insert([
            [

                'id' => 1,
                'about_desc' =>'about desc',
                'address' =>'address',
                'video' => '',
                'goals' => 'goals desc',
                'site_map' =>'1',
                'created_at' =>now(),
                'updated_at' =>now(),
            ],

        ]);
    }
}
