<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\LoginRepositoryInterface;

class AuthController extends Controller
{
    private LoginRepositoryInterface $LoginRepository;

    public function __construct(LoginRepositoryInterface $LoginRepository)
    {
        $this->LoginRepository = $LoginRepository;
    }

    public function login()
    {
        return $this->LoginRepository->login();
    }

    public function login_post(Request $request)
    {
         return $this->LoginRepository->login_post($request);
    }

    public function register()
    {
        return $this->LoginRepository->register();
    }


    public function register_post(Request $request)
    {
        return $this->LoginRepository->register_post($request);
    }
    public function logout()
    {
        return $this->LoginRepository->logout();
    }

}
