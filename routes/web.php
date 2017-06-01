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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('user', 'UserController');

Route::resource('project', 'ProjectController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('project/language/{language_id}', 'ProjectController@indexLanguage');
Route::get('project/join/{project_id}', 'ProjectController@join');
Route::get('project/quit/{project_id}', 'ProjectController@quit');
