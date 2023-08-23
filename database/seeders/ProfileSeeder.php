<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
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

        DB::table('profiles')->insert([
            [

                'id' => 1,
                'address' =>'emirate',
                'phone' =>'+96582224',

                'image' => '',
                'birthday' => '1995-1-13',
                'user_id' => 1,
                'student_id' => null,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 2,
                'address' =>'dubai',
                'phone' =>'+9658222252524',

                'image' => '',
                'birthday' => '1995-1-13',
                'user_id' => 2,
                'student_id' => null,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 3,
                'address' =>'jordan',
                'phone' =>'+96445282224',

                'image' => '',
                'birthday' => '1995-1-13',
                'user_id' => 3,
                'student_id' => null,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 4,
                'address' =>'syria',
                'phone' =>'+96336582224',

                'image' => '',
                'birthday' => '1995-1-13',
                'user_id' => 4,
                'student_id' => null,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 5,
                'address' =>'syria',
                'phone' =>'+9635282224',

                'image' => '',
                'birthday' => '1995-1-13',
                'user_id' => null,
                'student_id' => 1,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 6,
                'address' =>'egypt',
                'phone' =>'+9648586582224',

                'image' => '',
                'birthday' => '1995-1-13',
                'user_id' => null,
                'student_id' => 2,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 7,
                'address' =>'moroco',
                'phone' =>'+969156582224',

                'image' => '',
                'birthday' => '1995-1-13',
                'user_id' => null,
                'student_id' => 3,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 8,
                'address' =>'syria',
                'phone' =>'+96387982224',

                'image' => '',
                'birthday' => '1995-1-13',
                'user_id' => null,
                'student_id' => 3,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],

        ]);
    }
}
