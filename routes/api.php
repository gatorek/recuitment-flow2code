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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('movies', \App\Interfaces\Http\Api\Actions\Movie\ListMovieAction::class);
Route::post('movies', \App\Interfaces\Http\Api\Actions\Movie\CreateMovieAction::class);
Route::put('movies/{id}', \App\Interfaces\Http\Api\Actions\Movie\UpdateMovieAction::class)->where('id', '[0-9]+');
Route::delete('movies/{id}', \App\Interfaces\Http\Api\Actions\Movie\DeleteMovieAction::class)->where('id', '[0-9]+');
Route::post('movies/{id}/poster', \App\Interfaces\Http\Api\Actions\Movie\UploadMoviePosterAction::class)->where('id', '[0-9]+');
Route::get('movies/{title}', \App\Interfaces\Http\Api\Actions\Movie\FindMoviesByTitleAction::class);
