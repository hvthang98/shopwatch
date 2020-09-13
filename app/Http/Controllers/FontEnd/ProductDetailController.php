<?php

namespace App\Http\Controllers\FontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\ImgProduct;
use App\Models\Comment;
use App\Models\ReplyComment;
class ProductDetailController extends Controller
{
    public function getProductDetail(Request $request,$id)
    {
        $product=Products::find($request->id);
        $data['products']=$product;
        $data['infor_product']=json_decode($product->infor);
        $data['listProducts']=Products::orderBy('created_at','desc')->limit(6)->get();
        $data['comments']=Comment::where('products_id',$request->id)->get();
        return view('fontend.page.single',$data);
    }
}
