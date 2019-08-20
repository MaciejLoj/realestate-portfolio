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
Route::get('/uzytkownicy', 'HomeController@postAdminRoles');


// Route::group([
    //'middleware'=>'roles', roles to nazwa middleware'a w Kernel.php
    //'roles' => ['Admin', 'Moderator']

//])
Route::resource('posts', 'PostsController');

Auth::routes();
