<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function index(){
        return view('Admin.profile',[
            'user'=>Auth::user()
        ]);
    }
}
