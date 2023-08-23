<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
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

        DB::table('roles')->insert([
            [

                'id' => 1,
                'name' =>'owner',
                'guard_name' =>'web',
                'created_at' =>now(),
                'updated_at' =>now(),
            ],


        ]);
    }
}
