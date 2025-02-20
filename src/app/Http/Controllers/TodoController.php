<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todo = new Todo();
        $todos = $todo->all();  //allメソッドの返り値は、Illuminate\Database\Eloquent\Collectionクラスのインスタンス

        return view('todo.index', ['helloWorld' => 'hello World!']);
    }
}
