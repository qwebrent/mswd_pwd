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

Route::group(['middleware' => 'auth'], function () {
	//Route::resource('user', 'UserController', ['except' => ['show']]);
    Route::get('pwd/search', ['as' => 'pwd.search', 'uses' => 'PWDController@index']);
    Route::get('pwd/create', ['as' => 'pwd.create', 'uses' => 'PWDController@create']);
	Route::post('pwd/store', ['as' => 'pwd.store', 'uses' => 'PWDController@store']);
    Route::get('/pwd/{id}', ['as' => 'pwd.show', 'uses' => 'PWDController@show']);
    Route::get('/pwd/edit/{id}', ['as' => 'pwd.edit', 'uses' => 'PWDController@edit']);
    Route::put('/pwd/{pwdinfo}', ['as' => 'pwd.update', 'uses' => 'PWDController@update']);
    Route::delete('/pwd/{pwdinfo}', ['as' => 'pwd.destroy', 'uses' => 'PWDController@destroy']);
    Route::get('/pwd/download/{id}', ['as' => 'pwd.download', 'uses' => 'PWDController@download']);
});

