<?php

namespace App\Http\Controllers\FontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\ImgProduct;
class ProductDetailController extends Controller
{
    public function getProductDetail(Request $request)
    {
        $data['products']=Products::find($request->id);
        $data['listProducts']=Products::all();
        return view('fontend.page.single',$data);
    }
}
