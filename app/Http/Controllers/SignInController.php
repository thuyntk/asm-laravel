<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignInRequest;
use App\Models\User;
use Illuminate\Http\Request;

class SignInController extends Controller
{
    public function show(){
        return view('auth.add');
    }    
    public function store(SignInRequest $request){
        $data = $request->all();
        $data['role']=0;
        $data['avatar']='avatar.png';
        $data['status']=1;
        $data['password']=bcrypt($request->password);
        User::create($data);
        return redirect()->route('auth.getLogin');
    }
}
