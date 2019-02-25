<?php

// MaintenanceMode needs to be off --------------------------------------
Route::middleware(['maintenancemode'])->group(function(){
    Route::get('/genres','GenresController@index');
    Route::get('/tracks','TracksController@index');

    Route::get('/','PlaylistController@index');
    Route::get('/playlists/new','PlaylistController@create');
    Route::get('/playlists/{id}','PlaylistController@index');
    Route::post('/playlists','PlaylistController@store');

    Route::get('/tracks/new','TracksController@create');
    Route::post('/tracks','TracksController@store');

    Route::get('/genres/{id}/edit','GenresController@edit');
    Route::post('/genres','GenresController@store');

    Route::get('/signup','SignUpController@index');
    Route::post('/signup','SignUpController@signup');
});

// Need to be logged in/authenticated --------------------------------------
Route::middleware(['authenticated'])->group(function(){
    Route::get('/profile','AdminController@index');
    Route::get('/invoices', 'InvoicesController@index');
    Route::get('/settings', 'MaintenanceController@settings');
    Route::post('/settings', 'MaintenanceController@changesettings');
});

Route::get('/logout','LoginController@logout');
Route::get('/login','LoginController@index');
Route::post('/login','LoginController@login');

Route::get('/maintenance','MaintenanceController@index');
