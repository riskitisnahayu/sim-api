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
Route::middleware('api')->post('/user/login','UserController@login');

// untuk registrasi
Route::middleware('api')->post('/user/orangtua','UserController@regisortu');
Route::middleware('api')->post('/user/siswa','UserController@regisSiswa');
<<<<<<< HEAD
Route::middleware('api')->post('/user/login','UserController@login');
Route::middleware('api')->post('/user/logout','UserController@logout');

=======
>>>>>>> 184fa9bba2a078d9cfa96fe48fa293b50be6165a


Route::middleware('auth:api')->get('/province','ProvinceController@getProvince');
Route::middleware('auth:api')->get('/regency','RegencyController@getRegency');
Route::middleware('auth:api')->get('/district','DistrictController@getDistrict');

// untuk api create user
// Route::middleware('api')->post('/user','UserController@store');
// BERITA
Route::middleware('auth:api')->get('/berita','OrangtuaController@getNews');

Route::middleware('auth:api')->get('/province','ProvinceController@showProvince');


// untuk kategori game
Route::middleware('auth:api')->get('/gamecategory','GameCategoryController@getGameCategory');
Route::middleware('auth:api')->post('/gamecategory/store','GameCategoryController@store');
Route::middleware('auth:api')->get('/gamecategory/detail/{id}','GameCategoryController@show');
Route::middleware('auth:api')->put('/gamecategory/update/{id}','GameCategoryController@update');
Route::middleware('auth:api')->delete('/gamecategory/delete/{id}','GameCategoryController@destroy');

// untuk kategori mapel
Route::middleware('auth:api')->get('/subjectscategory','SubjectsCategoryController@getSubjectsCategory');
Route::middleware('auth:api')->post('/subjectscategory/store','SubjectsCategoryController@store');
Route::middleware('auth:api')->get('/subjectscategory/detail/{id}','SubjectsCategoryController@show');
Route::middleware('auth:api')->put('/subjectscategory/update/{id}','SubjectsCategoryController@update');
Route::middleware('auth:api')->delete('/subjectscategory/delete/{id}','SubjectsCategoryController@destroy');


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
