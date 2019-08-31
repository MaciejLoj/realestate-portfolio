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

Route::get('/', 'RealEstateController@start'); // OK
Route::get('/nieruchomosci', 'RealEstateController@showall'); // OK
Route::get('/mojeogloszenia', 'RealEstateController@myposts');
Route::get('/ogloszenia', 'PostsController@index');
Route::get('/ogloszenia/dodaj', 'PostsController@create');
Route::post('/ogloszenia', 'PostsController@store');
Route::get('/ogloszenia/{ogloszenie}'); // pokaz ogloszenie
Route::get('/ogloszenia/{ogloszenie}/edytuj'); // widok zmiany ogloszenia
Route::put('/ogloszenia/{ogloszenie}'); // wyslij zmiane do bazy
Route::delete('/ogloszenia/{ogloszenie}'); // usun ogloszenie
// });

Route::group(['middleware'=>'roles','roles'=>['Admin','Moderator']], function() {
    Route::get('/uzytkownicy', 'HomeController@all_users');
    Route::post('/uzytkownicy', 'HomeController@postAdminRoles');
    // put/patch zamiast post?
});

Auth::routes();
