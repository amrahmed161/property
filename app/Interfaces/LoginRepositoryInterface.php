<?php

namespace App\Interfaces;

interface loginRepositoryInterface
{
    public function login();
    public function login_post($request);
    public function register();
    public function register_post($request);
    public function logout();
}
