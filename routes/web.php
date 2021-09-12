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


Route::get('/', 'TripsController@top');

 // ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

 
 // 認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');


Route::group(['middleware' => ['auth']], function () {
       
  Route::group(['prefix' => 'trips/{id}'], function () {
           Route::post('favorite', 'FavoritesController@store')->name('favorites.favorite');
           Route::delete('unfavorite', 'FavoritesController@destroy')->name('favorites.unfavorite');
  });
    Route::resource('trips', 'TripsController');
    Route::get('yourtrips', 'TripsController@yourtrips')->name('trips.yourtrips');
    Route::get('favorite', 'TripsController@favorites')->name('trips.favorites');
    

});

 //画像ファイルをアップロードするボタンを設置するページへのルーティング
    Route::get('/upload/image', 'ImageController@input');
   //画像ファイルをアップロードする処理のルーティング
    Route::post('/upload/image', 'ImageController@upload');
   //アップロードした画像ファイルを表示するページのルーティング
    Route::get('/output/image', 'TripsController@show');
    Route::get('/output/image', 'TripsController@top');
