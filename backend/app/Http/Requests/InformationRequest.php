<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InformationRequest extends FormRequest
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
            'info_to' => ['required'],
        ];
    }

    public function attributes()
    {
        return [
            'subject' => 'タイトル',
            'content' => '内容',
            'info_to' => '提示クラス',
        ];
    }
}
