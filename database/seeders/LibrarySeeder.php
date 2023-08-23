<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LibrarySeeder extends Seeder
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

        DB::table('libraries')->insert([
            [

                'id' => 1,
                'name' =>'edu book 1',
                'link' =>'https://fhsdfsb.fskj/sdfsfs',
                'image' =>'',
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 2,
                'name' =>'edu book 2',
                'link' =>'https://fhsdfsb.fskj/sdfsfs',
                'image' =>'',
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 3,
                'name' =>'edu book 3',
                'link' =>'https://fhsdfsb.fskj/sdfsfs',
                'image' =>'',
                'created_at' =>now(),
                'updated_at' =>now(),
            ]

        ]);
    }
}
