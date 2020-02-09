<?php

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */

Route::get('/', function () {
    return view('index');
});

Route::get('/artist/{id}', 'artistController@showArtist');

Route::get('/artists', 'artistController@showArtists')->name('artists');

Route::post('/artist/likePost', 'artistController@checkLikeStatus')->name('likePost');

Route::post('/artist/unlikePost', 'artistController@checkunLikeStatus')->name('unlikePost');

// Route::get('/userLogin', 'userController@login');