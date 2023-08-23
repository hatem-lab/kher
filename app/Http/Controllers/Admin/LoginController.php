<?php

namespace App\Http\Controllers\Admin;
use App\Http\IRepositories\ILoginRepository;
use App\Http\IRepositories\IUserRepository;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;

class LoginController extends Controller
{
    protected $loginRepository;
    public function __construct(ILoginRepository   $loginRepository)
    {
        $this->loginRepository = $loginRepository;
    }

    public function  getLogin()
    {
        return $this->loginRepository->getLogin();
    }

    public function login(LoginRequest $request)
    {
        return $this->loginRepository->Login($request);
    }

    public function logout()
    {
        return $this->loginRepository->Logout();

    }

}
