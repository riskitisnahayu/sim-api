<?php

use Illuminate\Http\Request;

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

// untuk api create user
Route::middleware('api')->post('/user','UserController@store');

// untuk api game
Route::middleware('auth:api')->get('/games','GamesController@getGames');
Route::middleware('auth:api')->get('/games/{id}','GamesController@show');
Route::middleware('auth:api')->post('/games','GamesController@store');
Route::middleware('auth:api')->post('/games/{id}','GamesController@update');
Route::middleware('auth:api')->post('/games/{id}','GamesController@delete');

// untuk api ebook
Route::middleware('auth:api')->get('/ebook','EbookController@getEbook');
Route::middleware('auth:api')->get('/ebook/{id}','EbookController@show');
