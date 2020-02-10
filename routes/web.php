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
Route::get('/database', 'DatabaseController@database');
Route::get('/create', 'DatabaseController@database');
Route::post('/create', 'DatabaseController@addColumn')->name('post.database');
Route::post('/delete', 'DatabaseController@delete')->name('delete.col');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('{path}', 'HomeController@index');

