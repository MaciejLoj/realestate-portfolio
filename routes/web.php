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



Route::group(['middleware'=>'roles','roles'=>['User', 'Admin', 'Moderator']], function() {
    Route::get('/mojeogloszenia', 'RealEstateController@myposts'); // OK
    Route::get('/ogloszenia/dodaj', 'PostsController@create');
    Route::post('/ogloszenia', 'PostsController@store');
    Route::get('/ogloszenia/{id}/edytuj', 'PostsController@edit'); // widok zmiany ogloszenia
    Route::put('/ogloszenia/{id}', 'PostsController@update'); // wyslij zmiane do bazy
    Route::delete('/ogloszenia/{id}', 'PostsController@destroy'); // OK
});

Route::group(['middleware'=>'roles','roles'=>['Admin','Moderator']], function() {
    Route::get('/uzytkownicy', 'AdminController@all_users');
    Route::post('/uzytkownicy', 'AdminController@postAdminRoles');
    // put/patch zamiast post?
});

Auth::routes();

Route::get('/', 'RealEstateController@start'); // OK
Route::get('/nieruchomosci', 'RealEstateController@showall'); // OK
Route::get('/ogloszenia', 'PostsController@index'); // OK
Route::get('/ogloszenia/{id}', 'PostsController@show'); // pokaz ogloszenie
