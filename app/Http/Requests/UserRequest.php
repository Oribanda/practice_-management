<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //[ 変更：default=false ]
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'      =>['required', 'string'], // 必須
            'email'     => ['required', 'string', 'regex:|^[0-9a-z_./?-]+@([0-9a-z-]+\.)+[0-9a-z-]+$|', ], //必須
            'password'  => ['required', 'string', 'min:8', 'max:8', 'regex:/^(?=.*?[a-z])(?=.*?\d)[a-z\d]+$/i',], // 必須
            'introduce' => ['nullable', 'text', 'max:100'],
            // 'avter'     => 'file|image|max:10000',
            // 'image'    => 'file|image|max:10000', // 画像チェック, 10MB以内
        ];
    }

    //[ *3.追加：Validationメッセージを設定（省略可） ]
    //function名は必ず「messages」となります。
    public function messages()
    {
        return [
            'name'  => '名前を入力してください。',
            'email'       => 'メールアドレスを入力してください。',
            'introduce'       => '文章はは100字以内で入力して下さい。',
            'password' => 'パスワードは8文字以上で入力してください。',
        ];
    }
}
