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
            'email'=>'required|email',          
            'name'=>'required',
            'birthday'=>'required|date',
            'phonenumber'=>'required',
            'address'=>'required',
            
        ];
    }
    public function messages(){
        return ['required'=>'Không được để trống trường','email'=>'không đúng định dạng Email','confirmed'=>'Xác nhận lại mật khẩu'];
    }
}
