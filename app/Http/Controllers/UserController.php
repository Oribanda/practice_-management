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
        $user->introduce = $request->introduce;

        $rules = [
            'name'       => 'required|string|max:50',
            'email'      => 'required|email',
            'password'   => 'required|confirmed|min:8|max:8|confirmed',
            'password_confirmation' => 'required',
            'avatar'     => 'nullable|file|image|max:10000',
            'introduce'  => 'nullable|string|max:300',
        ];

        $messages = [
            'name.required'     => '名前を入力して下さい。',
            'name.max'          => '名前は:max文字以内で入力して下さい。',
            'email.required'    => 'メールアドレスを入力して下さい。',
            'email.email'       => '正しいメールアドレスを入力して下さい。',
            'password.required' => 'パスワードを入力して下さい。',
            'password.min'      => 'パスワードは:min文字以上で入力して下さい。',
            'password.max'      => 'パスワードは:max文字以内で入力して下さい。',
            'confirmed'         => ':attributeと、パスワードが一致していません。',
            'avatar.image'            => 'アバターは:imageを選択して下さい。',
            'avatar.max'            => 'アバターは:max以下の画像ファイルを選択して下さい。',
            'introduce.max'     => '文章は:max文字以内で入力して下さい。',
        ];

        $validator = validator($request->except(['avatar']), $rules, $messages);
        $validated = $validator->validate();

        if ($request->avatar == null) {

            // avatarが選択されていない場合

        } else {
            // /storage/public/imagesが作成される
            $file_path = $request->avatar->store('public/images');
            // public/imageshogehogeoghoe.jpgみたいな名前になるので、storage/images/を消す
            $file_name = str_replace('public/images', '', $file_path);
            // $file_nameをDBに保存
            $user->avatar = $file_name;
        }
        $user->save();

        return redirect("/user")->with(['validated' => $validated]);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect("/user");
    }

    public function store(Request $request)
    {
        $rules = [
            'name'                    => 'required|string|max:50',
            'email'                   => 'required|email',
            'password'                => 'required|confirmed|min:8|max:8|confirmed',
            'password_confirmation'   => 'required',
            'avatar'                  => 'nullable|file|mimes:jpeg,png,jpg|max:10000',
            'introduce'               => 'nullable|string|max:300',
        ];

        $messages = [
            'name.required'           => '名前を入力して下さい。',
            'name.max'                => '名前は:max文字以内で入力して下さい。',
            'email.required'          => 'メールアドレスを入力して下さい。',
            'email.email'             => '正しいメールアドレスを入力して下さい。',
            'password.required'       => 'パスワードを入力して下さい。',
            'password.min'            => 'パスワードは:min文字以上で入力して下さい。',
            'password.max'            => 'パスワードは:max文字以内で入力して下さい。',
            'confirmed'               => 'パスワードと確認用パスワードが一致していません。',
            'required'                => '確認用パスワードを入力して下さい。',
            'avatar.image'            => '画像はjpeg,png,jpgのいずれかの画像を選択して下さい。',
            'avatar.mimes'            => '画像はjpeg,png,jpgのいずれかの画像を選択して下さい。',
            'avatar.max'              => '画像は:max以下の画像ファイルを選択して下さい。',
            'introduce.max'           => '文章は:max文字以内で入力して下さい。',
        ];

        $validator = validator($request->except(['avatar']), $rules, $messages);
        $validated = $validator->validate();


        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->introduce = $request->introduce;

        if ($request->avatar == null){

            // avatarが選択されていない場合

        } else {
            // /storage/public/imagesが作成される
            $file_path = $request->avatar->store('public/images');
            // public/imageshogehogeoghoe.jpgみたいな名前になるので、storage/images/を消す
            $file_name = str_replace('public/images', '', $file_path);
            // $file_nameをDBに保存
            $user->avatar = $file_name;
        }

        $user->save();

        return redirect("user")->with(['validated'=>$validated]);
    }

}
