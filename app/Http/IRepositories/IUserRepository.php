<?php


namespace App\Http\IRepositories;


interface IUserRepository
{
    public function getAllUsers($input);
    public function createUser();
    public function storeUser($input);
    public function showUser($id);
    public function editUser($id);
    public function updateUser($input,$id);
    public function deleteUser($id);
    public function getUsersByRole($role);
}
