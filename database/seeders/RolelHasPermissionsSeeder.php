<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolelHasPermissionsSeeder extends Seeder
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

        $permissions=Permission::all();
        $role=Role::first();
        foreach ($permissions as $permission) {

            DB::table('role_has_permissions')->insert([
                [

                    'permission_id' => $permission->id,
                    'role_id' =>$role->id,

                ],


            ]);
        }
    }
}
