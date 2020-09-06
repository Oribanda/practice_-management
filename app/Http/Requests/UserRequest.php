<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use phpDocumentor\Reflection\Types\Nullable;

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
     * Validationルール
     * @return array
     */
    public function rules()
    {
        return [
            'name'      =>'required', // 必須
            'email'     => 'required|email', //必須
            'introduce' => 'nullable|max:100', //必須では無い。
            'password' => 'required|min:8', //必須
            'password_confirmation' => 'required|min:8', //必須
            // 'avatar'     => 'nullable|file|max:10000', // 画像チェック, 10MB以内
            'avatar'  => 'nullable'
        ];
    }

    /**
     * 項目名
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => '名前',
            'email' => 'E-mail',
            'password' => 'パスワード',
            'password_confirmation' => '確認用パスワード',
            'introduce' => '自己紹介文',
            'avatar' => 'プロフィール画像',
        ];
    }

    /**
     * エラーメッセージ
     *
     * @return array
     */
    //[ 追加：Validationメッセージを設定（省略可） ]
    //function名は必ず「messages」となります。
    public function messages()
    {
        return [
            'name.required'  => ':attributeは必須項目です。',
            'email.required'       => ':attributeは必須項目です。',
            'email.email' => ':attributeはメールアドレスの形式で入力してください。',
            'introduce.max:100'       => ':attributeは100字以内で入力して下さい。',
            'password.required'       => ':attributeは必須項目です。',
            'password.min' => ':attributeは8文字以上で入力してください。',
            'password_confirmation.required' => ':attributeは必須項目です。',
            'password_confirmation.min' => ':attributeは8文字以上で入力してください。',
            // 'avatar.max' => ':attributeは10MB以内にして下さい',
        ];
    }
}
