<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CertificateSeeder extends Seeder
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

        DB::table('certificates')->insert([
            [

                'id' => 1,
                'name_en' =>'height school',
                'name_ar' =>'height school ar',
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 2,
                'name_en' =>'institute',
                'name_ar' =>'institute ar',

                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 3,
                'name_en' =>'collage',
                'name_ar' =>'collage ar',

                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 4,
                'name_en' =>'none',
                'name_ar' =>'none ar',

                'created_at' =>now(),
                'updated_at' =>now(),
            ],

        ]);
    }
}
