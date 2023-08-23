<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{


$permissions = [
    'list users',
    'create user',
    'update user',
    'show user',
    'delete user',
    'block-activate user',

    'list roles',
    'create role',
    'update role',
    'show role',
    'delete role',


    'teachers',
    'list teachers',
    'create teacher',
    'update teacher',
    'show teacher',
    'delete teacher',
    'block-activate teacher',
    'TimeLine',


    'Students',
    'list Students',
    'create Student',
    'update Student',
    'show Student',
    'delete Student',
    'list pending Students',
    'block-activate Student',
    'accept-registration Student',
    'pendinglist',
    'List Certificates Requests',
    'create student certificate',

    'diplomas',
    'list diplomas',
    'create diplomas',
    'update diplomas',
    'delete diplomas',
    'show diploma',

    'courses',
    'list courses',
    'create courses',
    'update courses',
    'delete courses',
    'show course',
    'finish-activate course',

    'Lectures',
    'list Lecture',
    'add lecture files',
    'create Lecture',
    'update Lecture',
    'present students lecture',
    'delete Lecture',

    'Homework',
    'list Homework',
    'add files',
    'create Homework',
    'update Homework',
    'show Homework',
    'delete Homework',
    'student Homework',

    'Tests',
    'list Test',
    'create Test',
    'update Test',
    'delete Test',
    'students Test',

    'manage Test question',
    'create Question',
    'update Question',
    'show Question',
    'delete Question',


    'Certificates',
    'list Certificate',
    'create Certificate',
    'update Certificate',
    'delete Certificate',


    'blogs',
    'list blogs',
    'update blog',
    'create blog',
    'delete blog',
    'block blog',
    'delete comment',

    'Survey',
    'list Survey',
    'create Survey',
    'update Survey',
    'delete Survey',
    'show students Survey',
    'questions Survey',


    'library',
    'list library files',
    'add library files',
    'edit library files',
    'delete library files',

    'Setting',

];



foreach ($permissions as $permission) {

Permission::create(['name' => $permission]);
}


}
}
