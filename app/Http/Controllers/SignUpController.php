<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Auth;

class SignUpController extends Controller
{
    public function index(){
        return view('signup');
    }

    public function signup(){
        $user = new User();
        $user->email=request('email');
        $user->password=Hash::make(request('password'));
        $user->save();
        
        Auth::login($user);
        return redirect('/profile');
    }
}
