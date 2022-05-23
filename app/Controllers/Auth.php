<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login', [
            'config' => config('Auth'),
        ]);
    }

    public function register()
    {
        return view('auth/register');
    }
}