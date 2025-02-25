<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $table = 'todos';

    protected $fillable = [
        'content',
    ];
}


// fillable は、Eloquent ORM（Laravelのデータベース操作の仕組み）で使われるプロパティです。
// このプロパティは、マスアサインメント（一括代入）を防ぐために使用されます。
// マスアサインメントは、一度に大量のデータをデータベースに保存する手法です。
// 例えば、フォームから送られたデータをそのまま保存する場合、意図しない属性がデータベースに挿入されることを防ぐ必要があります。

// fillable を使う理由
// fillable は、どの属性を一度に更新（または保存）することが許可されているかを指定します。
// このプロパティに指定されたカラムだけがマスアサインメントを通じて更新されます。

// 異物混入を防ぐためのふるい分け（？）