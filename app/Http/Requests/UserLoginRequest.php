<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'name' => 'required',
            'birthday' => 'required|date',
            'phonenumber' => 'required',
            'address' => 'required',
            'captcha' => 'required|captcha',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Không được để trống trường', 
            'email' => 'không đúng định dạng Email', 
            'confirmed' => 'Xác nhận lại mật khẩu sai',
            'email.unique'=>'Tài khoản đã tồn tại',
            'captcha'=>'Sai mã xác thực'
        ];

    }
}
