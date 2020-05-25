<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class UserChangePW extends FormRequest
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
            'current_password'=>'required',
            'password'=>'required|confirmed|min:6'
        ];
    }
    public function messages()
    {
        return[
            'required'=>'không được để trống',
            'min'=>'Mật khẩu không được nhỏ hơn 6 ký tự',
            'confirmed'=>'Nhập lại mật khẩu sai'
        ];
    }
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ( !Hash::check($this->current_password,$this->user()->password) ) {
                $validator->errors()->add('current_password', 'Mật khẩu cũ sai');
            }
        });
        return;
    }
}
