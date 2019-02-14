<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

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

        return view('Tracks.tracks', [
            'tracks' => $tracks,
            'search' => $request->query('search'),
            'genre' => $request->query('genre')
        ]);
    
        }

    public function create(){
        $albums=DB::Table('albums')->get();
        $media_types=DB::Table('media_types')->get();
        $genres=DB::Table('genres')->get();
        
        return view('Tracks.create',[
            'albums'=>$albums,
            'media_types'=>$media_types,
            'genres'=>$genres
        ]);
    }

    public function store(Request $request){
        
        // validate inputs
        $input=$request->all();
        $validation = Validator::make($input, [
            'name'=>'required',
            'album'=>'required',
            'media_type'=>'required',
            'genre'=> 'required',
            'composer'=>'required',
            'milliseconds'=>'required|numeric|min:0',
            'byte'=>'required|numeric|min:0',
            'unit_price'=>'required|numeric|min:0'
        ]);

        
        if ($validation->fails()){
            return redirect('/tracks/new')
                ->withInput()
                ->withErrors($validation);
        }
        
        // otherwise insert the playlist into the db
        DB::table('Tracks')->insert([
            'Name' => $request->name,
            'AlbumId'=> $request->album,
            'MediaTypeId'=>$request->media_type,
            'GenreId'=> $request->genre,
            'Composer'=> $request->composer,
            'Milliseconds'=> $request->milliseconds,
            'Bytes'=> $request->byte,
            'UnitPrice'=> $request->unit_price
        ]);

        // redirect back to /playlists
        return redirect('/tracks');
    }

}
