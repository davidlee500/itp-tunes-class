<?php




Route::get('/', 'InvoicesController@index');

Route::get('/genres','GenresController@index');
Route::get('/tracks','TracksController@index');

Route::get('/playlists','PlaylistController@index');
Route::get('/playlists/new','PlaylistController@create');
Route::get('/playlists/{id}','PlaylistController@index');
Route::post('/playlists','PlaylistController@store');

Route::get('/tracks/new','TracksController@create');
Route::post('/tracks','TracksController@store');

Route::get('/genres/{id}/edit','GenresController@edit');
Route::post('/genres','GenresController@store');