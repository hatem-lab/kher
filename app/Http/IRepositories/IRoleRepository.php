<?php


namespace App\Http\IRepositories;


interface IRoleRepository
{
    public function getAllRoles($input);
    public function createRole();
    public function storeRole($input);
    public function showRole($id);
    public function editRole($id);
    public function updateRole($input,$id);
    public function deleteRole($id);
}
