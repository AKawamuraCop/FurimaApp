<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;

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

    public function getProfile(Request $request){
        $profile = Profile::with('user')
            ->where('user_id', Auth::id())
            ->first();

        return view('profile',compact('profile'));
    }
}
