<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
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

        DB::table('students')->insert([
            [

                'id' => 1,
                'name_en' =>'ahmad',
                'name_ar' =>'ahmad ar',

                'username' => 'ahmadStud',
                'email' => 'ahmad@gmail.com',
                'password' => bcrypt('123'),
                'is_confirmed' => 1,
                'status' => 1,
                'certificate_id' => 1,
                'fcm_token' => '1',
                'email_verified_at' => '1',
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 2,
                'name_en' =>'mhd',
                'name_ar' =>'mhd ar',

                'username' => 'mhdStud',
                'email' => 'mhd@gmail.com',
                'password' => bcrypt('123'),
                'is_confirmed' => 0,
                'status' => 1,
                'certificate_id' => 2,
                'fcm_token' => '1',
                'email_verified_at' => '1',

                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 3,
                'name_en' =>'yasmin',
                'name_ar' =>'yasmin ar',

                'username' => 'yasminStud',
                'email' => 'yasmin@gmail.com',
                'password' => bcrypt('123'),
                'is_confirmed' => 1,
                'status' => 1,
                'certificate_id' => 3,
                'fcm_token' => '1',
                'email_verified_at' => '1',

                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 4,
                'name_en' =>'saleh',
                'name_ar' =>'saleh ar',

                'username' => 'salehStud',
                'email' => 'saleh@gmail.com',
                'password' => bcrypt('123'),
                'is_confirmed' => 1,
                'status' => 1,
                'certificate_id' => 4,
                'fcm_token' => '1',
                'email_verified_at' => '1',

                'created_at' =>now(),
                'updated_at' =>now(),
            ],

        ]);
    }
}
