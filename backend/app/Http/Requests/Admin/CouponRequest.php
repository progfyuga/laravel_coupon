<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
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
            'user_id' => ['required','integer'],
            'coupon_name' => ['required', 'string', 'max:255'],
            'coupon_content' => ['required', 'string', 'max:255'],
            'target' => ['required', 'string', 'max:255'],
            'release_status' => ['required', 'integer'],
        ];
    }

    public function attributes()
    {
        return [
            'user_id' => 'ユーザーID',
            'coupon_name' => 'クーポン名',
            'coupon_content' => 'クーポン名',
            'target' => '対象者',
            'release_status' => '公開状態',
        ];
    }
}
