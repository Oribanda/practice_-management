<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        // DBよりUserテーブルの値全てを取得
        $users = User::all();

        // 取得した値をビュー「book/index」に渡す
        return view('user/index', compact('users'));
    }

    public function edit($id)
    {
        // DBよりURIパラメータと同じIDを持つUserの情報を取得
        $user = User::findOrFail($id);

        return view('user/edit', compact('user'));
    }
}
