<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'name'          => 'required|unique:products,name',
            'price'         => 'required',
            'sellprice'     => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.unique'           => 'Tên sản phẩm đã tồn tại',
            'name.required'         => 'Tên không được để trống',
            'price.required'        => 'Giá bán không được để trống',
            'sellprice.required'    => 'Giá khuyến mãi không được để trống',
        ];
    }
}
