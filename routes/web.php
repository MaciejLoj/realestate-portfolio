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

// Route dostepne dla wszystkich

Route::group(['middleware'=>'roles','roles'=>['User','Admin','Moderator']], function () {
    Route::get('/', 'RealEstateController@start');
    Route::get('/nieruchomosci', 'RealEstateController@showall');
    Route::get('/home', 'RealEstateController@home');
    Route::get('/mojeogloszenia', 'RealEstateController@myposts');
// do dodania wszystkie url z posts - create, id itp
    Route::get('/ogloszenia', 'PostsController@index');
    Route::get('/ogloszenia/dodaj', 'PostsController@create');
});


// Route dostepne tylko dla Admina i Moderatora
Route::group(['middleware'=>'roles','roles'=>['Admin','Moderator']], function() {
    Route::get('/uzytkownicy', 'HomeController@all_users');
    Route::post('/uzytkownicy', 'HomeController@postAdminRoles');
});

Auth::routes();
