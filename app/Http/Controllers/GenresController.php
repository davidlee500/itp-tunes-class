<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class GenresController extends Controller
{

    public function index(Request $request){
    $query=DB::table('genres');

    if ($request->query('search')){
        $query->where('genres.Name','=', $request->query('search'));
    }

    $genres = $query->get();

    return view('Genres.genres', [
        'genres' => $genres,
        'search' => $request->query('search')
    ]);

    }

    public function edit($GenreId=null){


        if($GenreId){
            $genres=DB::table('genres')->where('genres.GenreId','=', $GenreId)->first();
        }
        else{
            $genres=DB::table('genres')->first();
        }

        return view('Genres.edit', [
            'genres' => $genres
        ]);
    }

    public function store(Request $request){
        $input=$request->all();
        $validation = Validator::make($input, [
            'genre'=>'required|min:3|unique:genres,Name'
        ]);
        $url='/genres' . '/' . $request->genreId . '/edit';

        if ($validation->fails()){
            return redirect($url)
                ->withInput()
                ->withErrors($validation);
        }

        // otherwise insert the playlist into the db
        DB::table('genres')->insert([
            'Name' => $request->genre
        ]);

        // redirect back to /playlists
        return redirect('/genres');
    }
}
