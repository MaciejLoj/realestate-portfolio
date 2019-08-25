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

Route::get('/', 'RealEstateController@start');
Route::get('/nieruchomosci', 'RealEstateController@showall');
Route::get('/home', 'RealEstateController@home');
Route::get('/mojeogloszenia', 'RealEstateController@myposts');

Route::group([
    'middleware'=>'roles',
    'roles'=>['Admin','Moderator']
], function() {

    Route::get('/uzytkownicy', 'HomeController@all_users');
    Route::post('/uzytkownicy', 'HomeController@postAdminRoles');

});

//'middleware'=>'roles' pochodzi z-> Kernel.php->CheckRole.php
// roles => [] ustawiamy tutaj jako parametry i leca one potem do middleware->roles
Route::group([
    'middleware'=>'roles',
    'roles' => ['Admin', 'Moderator']

], function() {

    Route::resource('posts', 'PostsController');
});

Auth::routes();
