<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelHasRoleSeeder extends Seeder
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

        DB::table('model_has_roles')->insert([
            [

                'role_id' => 1,
                'model_type' =>'App\Models\User',
                'model_id' =>'1',
            ],


        ]);
    }
}
