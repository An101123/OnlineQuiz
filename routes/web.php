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
Route::get('/','LoginController@index');
Route::group(['prefix' => 'admin','middleware'=>['admin']],function(){


Route::get('index', 'HomeController@index');
Route::resource('question', 'QuestionController');
Route::resource('testtype', 'TypeController');
Route::resource('test', 'TestController');
Route::resource('user', 'UserController');
});

Route::get('login', 'LoginController@index');
Route::post('login', 'LoginController@login');
Route::get('logout', 'LoginController@logout');