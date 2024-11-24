<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

class UserController extends Controller
{
    public function getRegister()
    {
        return view('auth.register');
    }

    public function getLogin()
    {
        return view('auth.login');

    }

    public function getProfile(){
        return view('/profile');
    }
}
