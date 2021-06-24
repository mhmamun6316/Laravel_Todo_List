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


Route::get('/todos','TodoController@index')->name('todo.index');
Route::get('/todos/create','TodoController@create');
Route::post('/todos/create','TodoController@store');
Route::get('/todos/edit/{id}','TodoController@edit');
Route::get('/todos/delete/{id}','TodoController@delete');
Route::post('/todos/update/{id}','TodoController@update')->name('todo.update');
Route::post('/todos/complete/{id}','TodoController@complete')->name('todo.complete');


Route::get('/user','UserController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
