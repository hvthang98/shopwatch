<?php

namespace App\Http\Controllers\FontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Info_product;
use App\Models\Brands;

class SeachFontEndController extends Controller
{
    public function getSeach(Request $request)
    {
        $key = $request->seach;
        $data['key'] = $key;
        $products = Brands::join('products',function($product){
            $product->on('brands.id', 'products.brands_id')->where('products.status', 1);
        })->join('info_product', 'info_product.products_id', '=', 'products.id')->join('image_product', function ($image) {
            $image->on('products.id', '=', 'image_product.products_id')->where('level', 1);
        });
        //seach
        $products = $products->orWhere('products.name', 'like', '%' . $key . '%')->orWhere('brands.name', 'like', '%' . $key . '%')->orWhere('info_product.type', 'like', '%' . $key . '%')->get();
        $data['product'] = $products;
        $data['brands'] = Brands::all();
        return view('fontend.page.list-product-seach', $data);
    }
}
