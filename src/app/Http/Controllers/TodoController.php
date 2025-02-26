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
        $todo = $this->todo->find($id);             //Todo モデル（ここでは$this->todo）を使って、指定した id に一致するデータベースのレコードを取得し、その結果を $todo に格納する
        return view('todo.show', ['todo' => $todo]);
    }

    private $todo;                                  //TodoControllerのクラスプロパティ

    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
                                                    //コンストラクタインジェクションで生成したTodoクラスのインスタンスをプロパティに代入
    }                                               //→Todoクラスのインスタンスをコントローラ内で使いまわすことができる

    public function edit($id)
    {
        $todo = $this->todo->find($id);
        return view('todo.edit', ['todo' => $todo]);
    }

    public function update(Request $request, $id) // 第1引数: リクエスト情報の取得　第2引数: ルートパラメータの取得
    {
        $inputs = $request->all();
        $todo = $this->todo->find($id);
        $todo->fill($inputs)->save(); 

        return redirect()->route('todo.show', $todo->id);
    }

}
