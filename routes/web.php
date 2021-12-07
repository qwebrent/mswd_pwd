<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/pwd/dashboard', 'DashboardController@admin')->name('pwd.home');
Route::get('/senior/dashboard', 'DashboardController@senior')->name('senior.home');
Route::get('/status/update', 'SeniorController@updateStatus')->name('seniors.update.status');


// PWD
Route::group(['middleware' => 'auth'], function () {
    Route::get('pwd/search', ['as' => 'pwd.search', 'uses' => 'PWDController@index']);
    Route::get('pwd/create', ['as' => 'pwd.create', 'uses' => 'PWDController@create']);
	Route::post('pwd/store', ['as' => 'pwd.store', 'uses' => 'PWDController@store']);
    Route::get('/pwd/{id}', ['as' => 'pwd.show', 'uses' => 'PWDController@show']);
    Route::get('/pwd/edit/{id}', ['as' => 'pwd.edit', 'uses' => 'PWDController@edit']);
    Route::put('/pwd/{pwdinfo}', ['as' => 'pwd.update', 'uses' => 'PWDController@update']);
    Route::delete('/pwd/{pwdinfo}', ['as' => 'pwd.destroy', 'uses' => 'PWDController@destroy'])->middleware(['auth', 'password.confirm']);
    Route::get('/pwd/download/{id}', ['as' => 'pwd.download', 'uses' => 'PWDController@download']);
});


//Senior
Route::group(['middleware' => 'auth'], function () {
    Route::get('senior/search', ['as' => 'senior.search', 'uses' => 'SeniorController@index']);
    Route::get('/senior/search/deceased', ['as' => 'senior.showDeceased', 'uses' => 'SeniorController@showDeceased']);
    Route::get('senior/create', ['as' => 'senior.create', 'uses' => 'SeniorController@create']);
	Route::post('senior/store', ['as' => 'senior.store', 'uses' => 'SeniorController@store']);
    Route::get('/senior/{id}', ['as' => 'senior.show', 'uses' => 'SeniorController@show']);
    Route::get('/senior/edit/{id}', ['as' => 'senior.edit', 'uses' => 'SeniorController@edit']);
    Route::put('/senior/{seniorinfo}', ['as' => 'senior.update', 'uses' => 'SeniorController@update']);
    Route::delete('/senior/{seniorinfo}', ['as' => 'senior.destroy', 'uses' => 'SeniorController@destroy'])->middleware(['auth', 'password.confirm']);
    Route::delete('/senior/deceased/{seniorinfo}', ['as' => 'senior.deceased', 'uses' => 'SeniorController@deceased']);
    Route::get('/senior/download/{id}', ['as' => 'senior.download', 'uses' => 'SeniorController@download']);
    Route::get('/senior/restore/{dSenior}', ['as' => 'senior.restore', 'uses' => 'SeniorController@restore']);

});


//Data Import
Route::group(['middleware' => 'auth'], function () {
    Route::get('/data/import', ['as' => 'senior.import', 'uses' => 'DataImportController@index']);
    Route::post('/data/import', ['as' => 'senior.import.store', 'uses' => 'DataImportController@store']);
});


