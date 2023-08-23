<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
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

        DB::table('blogs')->insert([
            [

                'id' => 1,
                'title' =>'blog 1',
                'desc' =>'blog 1 desc',
                'status'=>1,
                'is_reject'=>0,
                'image' => '',
                'user_id' => 1,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 2,
                'title' =>'blog 2',
                'desc' =>'blog 2 desc',
                'status'=>1,
                'is_reject'=>0,
                'image' => '',
                'user_id' => 2,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 3,
                'title' =>'blog 3',
                'desc' =>'blog 3 desc',
                'status'=>1,
                'is_reject'=>0,
                'image' => '',
                'user_id' => 3,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 4,
                'title' =>'blog 4',
                'desc' =>'blog 4 desc',
                'status'=>1,
                'is_reject'=>0,
                'image' => '',
                'user_id' => 1,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],

        ]);
    }
}
