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
        // $user->avatar = $this->getClientOriginalName();
        // $user->avatar = $this->saveImage($request->avatar);
        // $request->file('upload_file');
        $user->introduce = $request->introduce;
        $user->save();

        return redirect("user");
    }

    public function saveImage($request_image)
    {
        $file_name = $request_image->getClientOriginalName();
        $file_path = $request_image->store('public', $file_name);
        $file_path = str_replace('public/', '', $file_path);
        return $file_path;
    }
}
