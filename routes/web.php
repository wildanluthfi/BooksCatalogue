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

Route::get('/', 'BookController@index');
Route::get('/add', 'BookController@create');
Route::get('/books/{book}', 'BookController@show');
Route::get('/books/{book}/edit', 'BookController@edit');
Route::post('/store', 'BookController@store');
Route::delete('/books/{book}', 'BookController@destroy');

Route::post('/review/store', 'ReviewController@store');
