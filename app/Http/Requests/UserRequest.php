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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'      => 'required', // 必須
            'email'     => 'email', //メールアドレスチェック
            'birthday'  => 'nullable|integer', //必須, 文字列
            'password'  => 'required', // 必須
            // 'avter'     => 'file|image|max:10000',
            // 'image'    => 'file|image|max:10000', // 画像チェック, 10MB以内
            'introduce' => 'nullable|text|max:500',
        ];
    }
}
