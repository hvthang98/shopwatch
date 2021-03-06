<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'Email' => 'required|email',
            'Password' => 'required|min:6'
        ];
    }
    public function messages(){
        return [
             'Email.required' => 'Email không được để trống',
             'Email.email' => 'Không đúng định dạng email',
             'Password.required' => 'Password không được để trống',
             'Password.min' => 'Mật khẩu không được nhỏ hơn 6 ký tự'];
    }
}
