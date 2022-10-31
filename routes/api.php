<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('artist', 'App\Http\Controllers\ArtistController@index');
Route::get('artist/{artist}', 'App\Http\Controllers\ArtistController@show');
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('artist', 'ArtistController@store');
    Route::put('artist/{artist}', 'ArtistController@update');
    Route::delete('artist/{artist}', 'ArtistController@delete');
});

Route::get('album', 'App\Http\Controllers\AlbumController@index');
Route::get('album/{album}', 'App\Http\Controllers\AlbumController@show');
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('album', 'AlbumController@store');
    Route::put('album/{album}', 'AlbumController@update');
    Route::delete('album/{album}', 'AlbumController@delete');
});


Route::get('song', 'App\Http\Controllers\SongController@index');
Route::get('song/{song}', 'App\Http\Controllers\SongController@show');
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('song', 'SongController@store');
    Route::put('song/{song}', 'SongController@update');
    Route::delete('song/{song}', 'SongController@delete');
});
