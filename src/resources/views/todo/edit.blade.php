@extends('layouts.base')
@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">ToDo編集</div>
      <div class="card-body">
        <form method="POST" action="{{ route('todo.update', $todo->id) }}"> <!--"todo.update" という名前のルートに、$todo->id を引数として渡し、対応するURLを取得する"-->
          @csrf
          @method('PUT')        <!--PUTメソッドでリクエストを送信--><!--<input type="hidden" name="_method" value="PUT">と同じ！！-->
                                <!--HTMLの仕様的に<form method="PUT">のようにPUTメソッドを指定することができない-->
          <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">ToDo入力</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="content" value="{{ $todo->content }}">
            </div>
          </div>
          <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
              <button type="submit" class="btn btn-primary">更新</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection