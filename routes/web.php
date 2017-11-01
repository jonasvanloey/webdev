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

Route::get('/', 'IndexController@show');

Route::get('/wedstrijd', 'CompetitionController@show');
Route::get('/wedstrijd/registreer', 'RegisterController@show');
Route::post('/wedstrijd/registreer/store', 'RegisterController@store');

Route::post('/wedstrijd/store', 'UploadController@store');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function()
{
    Route::get('', 'AdminController@show' );
    Route::get('/deelnemer/{id}', 'AdminController@user' );

});

Route::get('admin/deelnemer/{id}/del', 'AdminController@userdelete' );