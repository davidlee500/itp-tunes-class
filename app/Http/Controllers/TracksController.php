<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TracksController extends Controller
{
    public function index(Request $request){
        $query=DB::Table('tracks')
            ->join('albums', 'tracks.AlbumId','=','albums.AlbumId')
            ->join('artists', 'albums.ArtistId','=','artists.ArtistId')
            ->join('genres','tracks.genreId','genres.genreId')
            ->select('tracks.Name as trackName', 'albums.Title', 'artists.Name as artistName', 'tracks.UnitPrice', 'genres.Name','tracks.UnitPrice');

        if ($request->query('search')){
            $query->where('trackName', '=', $request->query('search'));
        }
        else if ($request->query('genre')){
            $query->where('genres.Name', '=', $request->query('genre'));
        }
        
        $tracks=$query->get();

        return view('tracks', [
            'tracks' => $tracks,
            'search' => $request->query('search'),
            'genre' => $request->query('genre')
        ]);
    
        }

}
