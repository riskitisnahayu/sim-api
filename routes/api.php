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
Route::middleware('auth:api')->post('/games/store','GamesController@store');
Route::middleware('auth:api')->get('/games/detail/{id}','GamesController@show');
Route::middleware('auth:api')->put('/games/update/{id}','GamesController@update');
Route::middleware('auth:api')->delete('/games/delete/{id}','GamesController@destroy');

// untuk api ebook
Route::middleware('auth:api')->get('/ebook','EbookController@getEbook');
Route::middleware('auth:api')->post('/ebook/store','EbookController@store');
Route::middleware('auth:api')->get('/ebook/detail/{id}','EbookController@show');
Route::middleware('auth:api')->put('/ebook/update/{id}','EbookController@update');
Route::middleware('auth:api')->delete('/ebook/delete/{id}','EbookController@destroy');
