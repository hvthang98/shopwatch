<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            'name'=>'required',
            'price'=>'required',
            'sellprice'=>'required',
            'ordernum'=>'required|min:0|numeric',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Tên không được để trống',
            'price.required'=>'Giá bán không được để trống',
            'sellprice.required'=>'Giá khuyến mãi không được để trống',
            'ordernum.required'=>'Sắp xếp không được để trống',
            'ordernum.min'=>'Sắp xếp nhỏ hơn không',
            'ordernum.numeric'=>'Sắp xếp không phải là số',
        ];
    }
}
