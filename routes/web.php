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

Route::group(['middleware'=>['verified','roles'],'roles'=>['User', 'Admin', 'Moderator']], function() {
    Route::get('/mojeogloszenia', 'RealEstateController@myposts'); // OK
    Route::get('/ogloszenia/dodaj', 'PostsController@create');
    Route::post('/ogloszenia', 'PostsController@store');
    Route::get('/ogloszenia/{post}/edytuj', 'PostsController@edit'); // widok zmiany ogloszenia
    Route::patch('/ogloszenia/{post}', 'PostsController@update'); // wyslij zmiane do bazy
    Route::delete('/ogloszenia/{post}', 'PostsController@destroy'); // OK
    // do aktualizacji
    Route::get('/zmianahasla', 'ChangePasswordController@show');
    Route::post('/zmianahasla', 'ChangePasswordController@update');

});

Route::group(['middleware'=>'roles','roles'=>['Admin','Moderator']], function() {
    Route::get('/uzytkownicy', 'AdminController@all_users');
    Route::post('/uzytkownicy', 'AdminController@postAdminRoles')->name('admin.assign');
    // put/patch zamiast post?
});

// zmienic auth::routes na polskie
Auth::routes(['verify' => true]);
// Auth::routes(['verify' => true]), POTWIERDZENIE REJESTRACJI MAILEM

Route::get('/', 'RealEstateController@start'); // OK
Route::get('/nieruchomosci', 'RealEstateController@showall'); // OK
Route::get('/ogloszenia', 'PostsController@index'); // OK
Route::get('/ogloszenia/{post}', 'PostsController@show'); // pokaz ogloszenie
// panel z wyborem ogloszen
Route::get('/znajdz-ogloszenie', 'PostsController@find_post_form');
Route::post('/znajdz-ogloszenie', 'PostsController@find_post_database');
