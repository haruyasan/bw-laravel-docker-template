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
| ここは、アプリケーションの Web ルートを登録する場所です。
| これらのルートは、RouteServiceProvider によって読み込まれ、"web" ミドルウェアグループを含むグループ内で管理されます。
| さあ、素晴らしいものを作りましょう！
|
*/

Route::get('/', function () {   //HTTPメソッドのGETを示しており、getメソッドの第一引数がURIを示している。
    return view('welcome');
});

Route::get('/todo', 'TodoController@index')->name('todo.index');

Route::get('/todo/create', 'TodoController@create')->name('todo.create');   

Route::post('/todo', 'TodoController@store')->name('todo.store');

Route::get('/todo/{id}', 'TodoController@show')->name('todo.show');


///todo というURLパスに対して、TodoController の @〇〇メソッドを実行するルートを定義。
//このルートに名前を付けている。
//->name('todo.index');     →次からはtodo.indexという名前でやるからよろしくね！！！という意味