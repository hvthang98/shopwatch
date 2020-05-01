<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brands;
use App\Models\Products;
class BrandController extends Controller
{
    public function product_of_brand($id){
    		
    	 $brand=Brands::where('id',$id)->get();

    	 $product=Brands::find($id)->product;
    	 $img=[];
    	 foreach ($product as  $pro) {
    	 	$pr=Products::find($pro->id)->imageProduct;
    	 	foreach ($pr as $key => $p) {
    	 		$img[]=$p->image;
    	 	}
    	 	
    	 }
    	 for($i=0;$i<count($img);$i++){
    		$product[$i]['img']=$img[$i];
    	}
    	 
    	 return view('fontend.page.list-product')->with('brand',$brand)->with('product',$product);
    }
}
