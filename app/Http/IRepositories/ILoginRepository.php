<?php


namespace App\Http\IRepositories;


interface ILoginRepository
{


    public function getLogin();
    public function Login($input);
    public function Logout();
}
