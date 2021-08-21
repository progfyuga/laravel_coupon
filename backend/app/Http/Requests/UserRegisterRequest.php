<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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

    public function rules()
    {
        return [
            'student_lastname' => ['required', 'string', 'max:255', 'regex:/^[ぁ-んァ-ヶ一-龠々]+$/u'],
            'student_lastname_kana' => ['required', 'string', 'max:255', 'regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u'],
            'student_firstname' => ['required', 'string', 'max:255', 'regex:/^[ぁ-んァ-ヶ一-龠々]+$/u'],
            'student_firstname_kana' => ['required', 'string', 'max:255', 'regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'tel_no' => ['required', 'regex:/^[0-9]+$/u', 'min:9'],
            'parent_lastname' => ['required', 'string', 'max:255', 'regex:/^[ぁ-んァ-ヶ一-龠々]+$/u'],
            'parent_lastname_kana' => ['required', 'string', 'max:255', 'regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u'],
            'parent_firstname' => ['required', 'string', 'max:255', 'regex:/^[ぁ-んァ-ヶ一-龠々]+$/u'],
            'parent_firstname_kana' => ['required', 'string', 'max:255', 'regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u'],
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
            'student_lastname' => '生徒の姓',
            'student_lastname_kana' => '生徒の姓のフリガナ',
            'student_firstname' => '生徒の名',
            'student_firstname_kana' => '生徒の名のフリガナ',
            'email' => 'メールアドレス',
            'address' => '住所',
            'tel_no' => '電話番号',
            'parent_lastname' => '保護者の姓',
            'parent_lastname_kana' => '保護者の姓のフリガナ',
            'parent_firstname' => '保護者の名',
            'parent_firstname_kana' => '保護者の名のフリガナ',
            'password' => 'パスワード',
        ];
    }
}
