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
            'name' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'prefecture_id' => ['required'],
            'tel_no' => ['required', 'regex:/^[0-9]+$/u', 'min:9'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

    public function messages()
    {
        return [
            'tel_no.regex' => '電話番号は整数のみで記入してください。',
            'tel_no.min' => '電話番号は9桁以上です。',
        ];
    }

    public function attributes()
    {
        return [
            'name' => '店舗名',
            'content' => '店舗の詳細',
            'email' => 'メールアドレス',
            'address' => '住所',
            'prefecture_id' => '都道府県',
            'tel_no' => '電話番号',
            'password' => 'パスワード',
        ];
    }
}
