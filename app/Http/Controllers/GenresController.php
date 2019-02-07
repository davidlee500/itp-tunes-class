<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class GenresController extends Controller
{

    public function index(Request $request){
    $query=DB::table('genres');

    if ($request->query('search')){
        $query->where('genres.Name','=', $request->query('search'));
    }

    $genres = $query->get();

    return view('genres', [
        'genres' => $genres,
        'search' => $request->query('search')
    ]);

    }

}
