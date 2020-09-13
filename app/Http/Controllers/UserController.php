<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('user/index', compact('users'));
    }

    public function create()
    {
        $user = new User();
        return view('user/create', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('user/edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->avatar = $request->avatar;
        $user->introduce = $request->introduce;
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect("/user");
    }

    public function store(Request $request)
    {
        // $image_file = $this->saveImage($request->avatar);
        // バリデーションルール
        $rules = [
            'file' => 'image|max:3000',
        ];
        //バリデーションされているファイルは (jpeg, png, bmp, gif, or svg)にしないといけません。
        //3000Kb以下のファイルにする必要です。

        // バリデーターにルールとインプットを入れる
        // $validation = Validator::make($request, $rules);

        // バリデーションチェックを行う
        // if ($validation->fails()) {
        //     return redirect('/')->with('message', 'ファイルを確認してください！');
        // }

        //バリデーションルール、メッセージをRequestファイルに書いて、呼ばれることもあります。

        $imageName = str_shuffle(time().
        $request->file('file')->getClientOriginalName()).'.'.
        $request->file('file')->getClientOriginalExtension(); //ファイル名をユニックするためstr_shuffleを使う
        $request->file('file')->move(
            base_path().'/public/images/catalog/confirm',
            $imageName
        );
        // return redirect('/')->with('message', 'ファイルをアップロードしました！');

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->avatar = $request->avatar;
        // $user->avatar = $this ->getClientOriginalName();
        // $user->avatar = $this->saveImage($request->avatar);
        $user->introduce = $request->introduce;
        $user->save();
        // // /storage/public/imagesが作成される
        // $file_path = $request->file->store('public/images');
        // public/imageshogehogeoghoe.jpgみたいな名前になるので、public/images/を消す
        // $file_name = str_replace('public/images/', '', $file_path);
        // $file_nameをDBに保存
        // var_dump($file_name);

        return redirect("user");
    }

    // public function saveImage($request_image)
    // {
    //     $file_name = $request_image->getClientOriginalName();
    //     $file_path = $request_image->store('public', $file_name);
    //     $file_path = str_replace('public/', '', $file_path);
    //     return $file_path;
    // }
}
