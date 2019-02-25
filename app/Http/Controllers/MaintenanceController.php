<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MaintenanceController extends Controller
{
    public function index(){
        return view('maintenance');
    }

    public function settings(){
        // $query=DB::table('configurations')->where('name','maintenance')->first();
        // $mode=$query->value;
        // $name=$query->name;
        // return view ('settings',[
        //     'name' => $name,
        //     'mode' => $mode
        // ]);
        return view('settings');
    }

    public function changesettings(Request $request){
        if(isset($request->on)){
            DB::table('configurations')->where('name','maintenance')->update(['value'=> 'on']);
        } else {
            DB::table('configurations')->where('name','maintenance')->update(['value'=> 'off']);
        }
        
        // redirect back to /playlists
        return redirect('/');
    }

}
