<?php

namespace App\Http\Controllers;         

use Illuminate\Http\Request;

/*
 *Request...ユーザーがフォームを送信したり、APIリクエストを送る際に送られてくるデータ（例: パラメータやファイル）を取得したりするためのクラス。
 *HTTPリクエストは、例えばフォームに入力されたデータや、URLパラメータ、ヘッダー情報などが含まれ、データを簡単に操作したり、取得したりできる。
 */

use App\Todo;                                       //todo.phpのtodoクラスをインポートしている

class TodoController extends Controller             //このクラスはApp\Http\Controllersという名前空間に属している。
                                                    // extendsのControllerは別ファイル「Controller.php」からクラスを引っ張っている
{
    private $todo;                                  //TodoControllerのクラスプロパティ

    public function index()
    {
        $todos = $this->todo->all();   //Todo.phpのTodoクラスをインスタンス化して、それを$todoという変数に代入する
                                       //allメソッドの返り値は、(Illuminate\Database\Eloquent\)Collectionクラスのインスタンス
                                       //ORMで、データベースと紐づけをしている

        return view('todo.index', ['todos' => $todos]);     //bladeファイルを表示する
    }

    public function create()
    {
        return view('todo.create');     //bladeファイルの表示
    }

    public function store(Request $request)
    {
        $inputs = $request->all();

        $this->todo->fill($inputs);                 //指定のidのついたレコードの取得
        $this->todo->save();                        //レコードの保存

        return redirect()->route('todo.index');         //一覧画面にリダイレクトする
    }

    public function show($id)
    {
        $todo = $this->todo->find($id);             //$this->todoはTodoControllerのクラスプロパティ
        return view('todo.show', ['todo' => $todo]);
    }

    public function __construct(Todo $todo)
    {
        $this->todo = $todo;                        //コンストラクタインジェクションで生成したTodoクラスのインスタンスをプロパティに代入
    }                                               //→Todoクラスのインスタンスをコントローラ内で使いまわすことができる
}
