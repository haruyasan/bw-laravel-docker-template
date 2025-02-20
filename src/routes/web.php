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

Route::get('/', function () {   //HTTPメソッドのGETを示しており、getメソッドの第一引数がURIを示している。
    return view('welcome');
});

Route::get('/todo', 'TodoController@index');