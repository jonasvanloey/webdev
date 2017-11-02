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

Route::get('/stem', 'CompetitionController@voteindex');

Route::get('/wedstrijd', 'CompetitionController@show');
Route::get('/wedstrijd/registreer', 'RegisterController@show');
Route::post('/wedstrijd/registreer/store', 'RegisterController@store');

Route::post('/wedstrijd/store', 'UploadController@store');
Route::get('/vote/{id}', 'CompetitionController@vote' );

//Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
//Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');
Auth::routes();



Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function()
{
    Route::get('', 'AdminController@show' );
    Route::get('/deelnemer/{id}', 'AdminController@user' );
    Route::get('/wedstrijd', 'AdminController@cpanel' );
    Route::post('/wedstrijd/start', 'AdminController@start' );
    Route::get('/deelnemer/{id}/del', 'AdminController@userdelete' );
    Route::get('/excel', 'AdminController@excel' );

});



