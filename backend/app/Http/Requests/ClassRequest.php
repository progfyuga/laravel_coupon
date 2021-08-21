<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'course' => ['required'],
            'class_id' => ['required'],
            'class_name' => ['required'],
        ];
    }

    public function attributes()
    {
        return [
            'course' => 'コースID',
            'class_id' => 'クラスID',
            'class_name' => 'クラス名',
        ];
    }
}
