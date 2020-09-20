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
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->avatar = $request->avatar;
        $user->introduce = $request->introduce;

        // /storage/public/imagesが作成される
        $file_path = $request->avatar->store('public/images');
        // public/imageshogehogeoghoe.jpgみたいな名前になるので、storage/images/を消す
        $file_name = str_replace('public/images', '', $file_path);
        // $file_nameをDBに保存
        $user->avatar = $file_name;



        $user->save();


        return redirect("user");
    }

}
