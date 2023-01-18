<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'name' => 'required|max:50',
            'phone' => 'required|regex:/^[0-9]{10}/|max:10',
            'email' => 'required|email',
            'url' => 'required|max:255',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => '此欄位為必填',
            'max' => '此欄位最多 :max 個字',
            'integer' => '此欄位只能填寫數字',
            'phone.regex' => '請填寫正確的手機號碼',
            'email.email' => '請填寫正確的電子信箱',
        ];
    }
}
