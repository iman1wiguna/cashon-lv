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

Auth::routes(['register'=>false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/transaksi', 'TransaksiController@index');

Route::get('/topup', 'RequestController@index');
Route::get('/requesttopup/{id}', 'RequestController@destroy');
Route::get('/usersaldo/{id}','RequestController@edit');
Route::patch('/usersaldo/update/{id}','RequestController@update');

Route::get('/user', 'UserController@index');

Route::get('/admin', 'AdminController@index');
Route::post('/admin/store', 'AdminController@store');