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
    Route::get('/mojeogloszenia', 'RealEstateController@myposts');
    Route::get('/ogloszenia/dodaj', 'PostsController@create');
    Route::post('/ogloszenia', 'PostsController@store');
    Route::get('/ogloszenia/{post}/edytuj', 'PostsController@edit');
    Route::patch('/ogloszenia/{post}', 'PostsController@update');
    Route::delete('/ogloszenia/{post}', 'PostsController@destroy');
    Route::get('/zmianahasla', 'ChangePasswordController@show');
    Route::post('/zmianahasla', 'ChangePasswordController@update');
});

Route::group(['middleware'=>'roles','roles'=>['Admin','Moderator']], function() {
    Route::get('/uzytkownicy', 'AdminController@all_users');
    Route::post('/uzytkownicy', 'AdminController@postAdminRoles')->name('admin.assign');
});

// zmienic auth::routes na polskie
// Auth::routes(['verify' => true]), POTWIERDZENIE REJESTRACJI MAILEM
Auth::routes(['verify' => true]);

Route::get('/kontakt', 'RealEstateController@contact_us');
Route::post('/kontakt', 'RealEstateController@send_message');
Route::get('/', 'RealEstateController@newstart');
// Route::get('/', 'RealEstateController@start');
Route::get('/nieruchomosci', 'RealEstateController@showall');
Route::get('/ogloszenia', 'PostsController@index');
Route::get('/noweogloszenia', 'PostsController@show_all_properties');
Route::get('/ogloszenia/{post}', 'PostsController@show');
Route::get('/znajdz-ogloszenie', 'PostsController@find_post');
Route::post('/znajdz-ogloszenie', 'PostsController@find_post_db');
Route::get('/znajdz-nieruchomosc', 'PostsController@find_realestate');
Route::post('/znajdz-nieruchomosc', 'PostsController@find_realestate_db');;
Route::get('/znajdz-pozostale', 'PostsController@find_other');
Route::post('/znajdz-pozostale', 'PostsController@find_other_db');
