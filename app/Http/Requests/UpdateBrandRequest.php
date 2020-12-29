<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class UpdateBrandRequest extends FormRequest
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
    public function rules(Request $req)
    {
        return [
            // 'name'=>'unique:brands,name,'.$this->segment(3).',id'
            'name'=>'unique:brands,name,'.$req->id.',id'
        ];
    }
    public function messages()
    {
        return [
            'name.unique'=>'Thương hiệu đã tồn tại'
        ];
    }
}
