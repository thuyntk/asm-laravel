<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('auth.login');
    }
    public function postLogin(LoginRequest $request)
    {
        if(Auth::attempt([
            'email'    => $request->email,
            'password'  => $request->password 
        ])){
            if(Auth::user()->role == 1){
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('main');
        } else {
            return redirect()->route('auth.getLogin');
        }
    }

    

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.getLogin');
    }
}
