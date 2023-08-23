<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
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

        DB::table('users')->insert([
            [

                'id' => 1,
                'name' =>'super admin',
                'email' =>'super_admin@gmail.com',

                'password' => bcrypt('123'),
                'role' => '1',
                'roleIds' => json_encode([1]),
                'status' => 1,
                'fcm_token' => '1',
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 2,
                'name' =>'admin',
                'email' =>'admin@gmail.com',

                'password' => bcrypt('123'),
                'role' => '1',
                'roleIds' => json_encode([2]),
                'status' => 1,
                'fcm_token' => '1',
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 3,
                'name' =>'teacher',
                'email' =>'teacher@gmail.com',

                'password' => bcrypt('123'),
                'role' => '2',
                'roleIds' => json_encode([3]),
                'status' => 1,
                'fcm_token' => '1',
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 4,
                'name' =>'publisher',
                'email' =>'publisher@gmail.com',

                'password' => bcrypt('123'),
                'role' => '3',
                'roleIds' => json_encode([4]),
                'status' => 1,
                'fcm_token' => '1',
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 5,
                'name' =>'teacher2',
                'email' =>'teacher2@gmail.com',

                'password' => bcrypt('123'),
                'role' => '2',
                'roleIds' => json_encode([3]),
                'status' => 1,
                'fcm_token' => '1',
                'created_at' =>now(),
                'updated_at' =>now(),
            ],

        ]);
    }
}
