<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
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

        DB::table('comments')->insert([
            [

                'id' => 1,
                'desc' =>'comment 1',
                'student_id' =>1,

                'user_id' => null,
                'blog_id' => 1,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 2,
                'desc' =>'comment 2',
                'student_id' =>2,

                'user_id' => null,
                'blog_id' => 1,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 3,
                'desc' =>'comment 3',
                'student_id' =>2,

                'user_id' => null,
                'blog_id' => 2,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 4,
                'desc' =>'comment 4',
                'student_id' =>null,
                'user_id' => 1,
                'blog_id' => 3,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],

        ]);
    }
}
