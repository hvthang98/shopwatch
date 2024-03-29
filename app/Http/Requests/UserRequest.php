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
            'email' => 'required|email|unique:users,email',
            'name' => 'required',
            'birthday' => 'required|date',
            'phone_number' => 'required|numeric',
            'address' => 'required',
            'password' => 'required|same:password_confirmation|min:6'
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Không được để trống trường',
            'email' => 'không đúng định dạng Email',
            'password.same' => 'Xác nhận lại mật khẩu sai',
            'email.unique' => 'Email đã tồn tại',
            'numeric'=>'Số điện thoại không phải dạng số',
            'min'=>'Mật khẩu ít nhất 6 ký tự',
        ];
    }
}
