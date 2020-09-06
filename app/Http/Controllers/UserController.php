<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        // DBよりUserテーブルの値全てを取得
        $users = User::all();

        // 取得した値をビュー「user/index」に渡す
        return view('user/index', compact('users'));
    }

    public function edit($id)
    {
        // DBよりURIパラメータと同じIDを持つUserの情報を取得
        $user = User::findOrFail($id);

        return view('user/edit', compact('user'));
    }

    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->introduce = $request->introduce;
        $user->avatar = $request->avatar;
        $user->password = $request->password;
        $user->password_confirmation = $request->password_confirmation;
        $user->save();

        return redirect("/user");
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect("/user");
    }

    public function create()
    {
        // 空の$userを渡す。変数を渡さないとUndefined Variableエラーになる。
        $user = new User();
        return view('user/create', compact('user'));
    }

    public function store(UserRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->avatar = $request->avatar;
        $user->introduce = $request->introduce;
        $user->password = $request->password;
        $user->password_confirmation = $request->password_confirmation;
        $user->save();

        return redirect("/user");
    }

    /**
     * ファイルアップロード処理
     */
    public function upload(UserRequest $request)
    {

    }
}
