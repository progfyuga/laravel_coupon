<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeachersMessageRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'subject' => ['required'],
            'content' => ['required'],
            'class_to' => ['required'],
        ];
    }

    public function attributes()
    {
        return [
            'subject' => 'タイトル',
            'content' => '内容',
            'class_to' => '提示クラス',
        ];
    }
}
