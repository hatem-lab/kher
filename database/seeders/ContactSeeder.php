<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
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

        DB::table('contacts')->insert([
            [

                'id' => 1,
                'whats_phone' =>'+96358844',
                'mobile_phones' =>json_encode(['+963852741', '+987255564']),
                'land_phones' => json_encode(['+02582254', '+75852255']),
                'whats_link' => 'whats',
                'insta_link' =>'insta',
                'facebook_link' =>'facebook',
                'twitter_link' => 'twitter',
                'linkedin_link' => 'linkedin',
                'telegram_link' => 'twitter',
                'created_at' =>now(),
                'updated_at' =>now(),
            ],

        ]);
    }
}
