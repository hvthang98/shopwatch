<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules(Request $request)
    {
        return [
            'email' => 'required|email|unique:users,email,'.$request->id,
            'name' => 'required',
            'birthday' => 'required|date',
            'phone_number' => 'required|numeric',
            'address' => 'required',
            'role_id'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Không được để trống trường',
            'email' => 'không đúng định dạng Email',
            'email.unique' => 'Email đã tồn tại',
            'numeric'=>'Số điện thoại không phải dạng số',
        ];
    }
}
