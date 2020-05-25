<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\collection;
use App\Models\Brands;
use App\Models\Products;
use App\Models\Info_product;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    public function all_male_product(Request $request){
    	$product=DB::table('products')->join('brands','products.brands_id','=','brands.id')->join('image_product','products.id','=','image_product.products_id')->join('info_product','products.id','=','info_product.products_id')->where('image_product.level',1)->whereIn('info_product.gender',[1,10])->select('products.*','image_product.image');
    	$tempt=0;
    	if($request->has('sort')){
    	 	$tempt=1;
    	 	$sort=$request->sort;
    	 	switch ($sort) {

    	 		case 'id':
    	 		$product=$product->orderBy('products.id','DESC');
    	 		break;

    	 		case 'name':
    	 		$product=$product->orderBy('products.name','DESC');
    	 		break;

    	 		case 'price_asc':

    	 		$product=$product->orderBy('sellprice','ASC');
    	 		break;

    	 		case 'price_desc':
    	 		$product=$product->orderBy('sellprice','DESC');
    	 		break;

    	 		default:
    	 		$product=$product->orderBy('id','DESC');
    	 		break;
    	 	}
	 	
    	 }
    	if($request->has('price')){
    		$price=$request->price;
    		$tempt=2;
    		switch ($price) {
    			case '1':
    				$product=$product->where('products.sellprice','<',5000000);
    				break;
    			case '2':
    				$product=$product->whereBetween('products.sellprice',[5000000,10000000]);
    				break;
    			case '3':
    				$product=$product->where('products.sellprice','>',10000000);
    				break;
    			
    		}
    	}
    	if($request->has('brand')){
    		$brand=$request->brand;
    		$tempt=3;
    		$product=$product->where('products.brands_id',$brand);
    	}
    	if($request->has('sort') && $request->has('price')){
    		$tempt=4;
    		$sort=$request->sort;
    	 	switch ($sort) {

    	 		case 'id':
    	 		$product=$product->orderBy('products.id','DESC');
    	 		break;

    	 		case 'name':
    	 		$product=$product->orderBy('products.name','DESC');
    	 		break;

    	 		case 'price_asc':

    	 		$product=$product->orderBy('sellprice','ASC');
    	 		break;

    	 		case 'price_desc':
    	 		$product=$product->orderBy('sellprice','DESC');
    	 		break;

    	 		default:
    	 		$product=$product->orderBy('id','DESC');
    	 		break;
    	 	}
    	 	$price=$request->price;
    		switch ($price) {
    			case '1':
    				$product=$product->where('products.sellprice','<',5000000);
    				break;
    			case '2':
    				$product=$product->whereBetween('products.sellprice',[5000000,10000000]);
    				break;
    			case '3':
    				$product=$product->where('products.sellprice','>',10000000);
    				break;
    			
    		}
    	}
    	if($request->has('sort') && $request->has('brand')){
    		$tempt=5;
    		$sort=$request->sort;
    	 	switch ($sort) {

    	 		case 'id':
    	 		$product=$product->orderBy('products.id','DESC');
    	 		break;

    	 		case 'name':
    	 		$product=$product->orderBy('products.name','DESC');
    	 		break;

    	 		case 'price_asc':

    	 		$product=$product->orderBy('sellprice','ASC');
    	 		break;

    	 		case 'price_desc':
    	 		$product=$product->orderBy('sellprice','DESC');
    	 		break;

    	 		default:
    	 		$product=$product->orderBy('id','DESC');
    	 		break;
    	 	}
    	 	$brand=$request->brand;
    		
    		$product=$product->where('products.brands_id',$brand);

    	}
    	if($request->has('price') && $request->has('brand')){
    		$tempt=6;
    		$price=$request->price;
    		switch ($price) {
    			case '1':
    				$product=$product->where('products.sellprice','<',5000000);
    				break;
    			case '2':
    				$product=$product->whereBetween('products.sellprice',[5000000,10000000]);
    				break;
    			case '3':
    				$product=$product->where('products.sellprice','>',10000000);
    				break;
    			
    		}
    		$brand=$request->brand;
    		
    		$product=$product->where('products.brands_id',$brand);
    	}
    	if($request->has('sort') && $request->has('price') && $request->has('brand')){
    		$tempt=7;
    		$sort=$request->sort;
    	 	switch ($sort) {

    	 		case 'id':
    	 		$product=$product->orderBy('products.id','DESC');
    	 		break;

    	 		case 'name':
    	 		$product=$product->orderBy('products.name','DESC');
    	 		break;

    	 		case 'price_asc':

    	 		$product=$product->orderBy('sellprice','ASC');
    	 		break;

    	 		case 'price_desc':
    	 		$product=$product->orderBy('sellprice','DESC');
    	 		break;

    	 		default:
    	 		$product=$product->orderBy('id','DESC');
    	 		break;
    	 	}
    	 	$price=$request->price;
    		switch ($price) {
    			case '1':
    				$product=$product->where('products.sellprice','<',5000000);
    				break;
    			case '2':
    				$product=$product->whereBetween('products.sellprice',[5000000,10000000]);
    				break;
    			case '3':
    				$product=$product->where('products.sellprice','>',10000000);
    				break;
    			
    		}
    		$brand=$request->brand;
    		
    		$product=$product->where('products.brands_id',$brand);


    	}
    	switch ($tempt) {
    		case '0':
    			$product=$product->paginate(6);
    			break;
    		case '1':
    			$product=$product->paginate(6)->appends('sort',request('sort'));
    			break;
    		case '2':
    			$product=$product->paginate(6)->appends('price',request('price'));
    			break;
    		case '3':
    			$product=$product->paginate(6)->appends('brand',request('brand'));
    			break;
    		case '4':
    			$product=$product->paginate(6)->appends('sort',request('sort'))->appends('price',request('price'));
    			break;
    		case '5':
    			$product=$product->paginate(6)->appends('sort',request('sort'))->appends('brand',request('brand'));
    			break;
    		case '6':
    			$product=$product->paginate(6)->appends('brand',request('brand'))->appends('price',request('price'));
    			break;
    		case '7':
    			$product=$product->paginate(6)->appends('sort',request('sort'))->appends('price',request('price'))->appends('brand',request('brand'));
    			break;	
    		
    	}
    	
    	return view('fontend.page.list-product')->with('product',$product)->with('i',1);
    }
    public function all_male_product_brand(Request $request, $id){
    	$product=DB::table('products')->join('brands','products.brands_id','=','brands.id')->join('image_product','products.id','=','image_product.products_id')->join('info_product','products.id','=','info_product.products_id')->where('image_product.level',1)->where('products.brands_id',$id)->whereIn('info_product.gender',[1,10])->select('products.*','image_product.image');
    	$tempt=0;
    	if($request->has('sort')){
    	 	$tempt=1;
    	 	$sort=$request->sort;
    	 	switch ($sort) {

    	 		case 'id':
    	 		$product=$product->orderBy('products.id','DESC');
    	 		break;

    	 		case 'name':
    	 		$product=$product->orderBy('products.name','DESC');
    	 		break;

    	 		case 'price_asc':

    	 		$product=$product->orderBy('sellprice','ASC');
    	 		break;

    	 		case 'price_desc':
    	 		$product=$product->orderBy('sellprice','DESC');
    	 		break;

    	 		default:
    	 		$product=$product->orderBy('id','DESC');
    	 		break;
    	 	}
	 	
    	 }
    	if($request->has('price')){
    		$price=$request->price;
    		$tempt=2;
    		switch ($price) {
    			case '1':
    				$product=$product->where('products.sellprice','<',5000000);
    				break;
    			case '2':
    				$product=$product->whereBetween('products.sellprice',[5000000,10000000]);
    				break;
    			case '3':
    				$product=$product->where('products.sellprice','>',10000000);
    				break;
    			
    		}
    	}
    	if($request->has('brand')){
    		$brand=$request->brand;
    		$tempt=3;
    		$product=$product->where('products.brands_id',$brand);
    	}
    	if($request->has('sort') && $request->has('price')){
    		$tempt=4;
    		$sort=$request->sort;
    	 	switch ($sort) {

    	 		case 'id':
    	 		$product=$product->orderBy('products.id','DESC');
    	 		break;

    	 		case 'name':
    	 		$product=$product->orderBy('products.name','DESC');
    	 		break;

    	 		case 'price_asc':

    	 		$product=$product->orderBy('sellprice','ASC');
    	 		break;

    	 		case 'price_desc':
    	 		$product=$product->orderBy('sellprice','DESC');
    	 		break;

    	 		default:
    	 		$product=$product->orderBy('id','DESC');
    	 		break;
    	 	}
    	 	$price=$request->price;
    		switch ($price) {
    			case '1':
    				$product=$product->where('products.sellprice','<',5000000);
    				break;
    			case '2':
    				$product=$product->whereBetween('products.sellprice',[5000000,10000000]);
    				break;
    			case '3':
    				$product=$product->where('products.sellprice','>',10000000);
    				break;
    			
    		}
    	}
    	if($request->has('sort') && $request->has('brand')){
    		$tempt=5;
    		$sort=$request->sort;
    	 	switch ($sort) {

    	 		case 'id':
    	 		$product=$product->orderBy('products.id','DESC');
    	 		break;

    	 		case 'name':
    	 		$product=$product->orderBy('products.name','DESC');
    	 		break;

    	 		case 'price_asc':

    	 		$product=$product->orderBy('sellprice','ASC');
    	 		break;

    	 		case 'price_desc':
    	 		$product=$product->orderBy('sellprice','DESC');
    	 		break;

    	 		default:
    	 		$product=$product->orderBy('id','DESC');
    	 		break;
    	 	}
    	 	$brand=$request->brand;
    		
    		$product=$product->where('products.brands_id',$brand);

    	}
    	if($request->has('price') && $request->has('brand')){
    		$tempt=6;
    		$price=$request->price;
    		switch ($price) {
    			case '1':
    				$product=$product->where('products.sellprice','<',5000000);
    				break;
    			case '2':
    				$product=$product->whereBetween('products.sellprice',[5000000,10000000]);
    				break;
    			case '3':
    				$product=$product->where('products.sellprice','>',10000000);
    				break;
    			
    		}
    		$brand=$request->brand;
    		
    		$product=$product->where('products.brands_id',$brand);
    	}
    	if($request->has('sort') && $request->has('price') && $request->has('brand')){
    		$tempt=7;
    		$sort=$request->sort;
    	 	switch ($sort) {

    	 		case 'id':
    	 		$product=$product->orderBy('products.id','DESC');
    	 		break;

    	 		case 'name':
    	 		$product=$product->orderBy('products.name','DESC');
    	 		break;

    	 		case 'price_asc':

    	 		$product=$product->orderBy('sellprice','ASC');
    	 		break;

    	 		case 'price_desc':
    	 		$product=$product->orderBy('sellprice','DESC');
    	 		break;

    	 		default:
    	 		$product=$product->orderBy('id','DESC');
    	 		break;
    	 	}
    	 	$price=$request->price;
    		switch ($price) {
    			case '1':
    				$product=$product->where('products.sellprice','<',5000000);
    				break;
    			case '2':
    				$product=$product->whereBetween('products.sellprice',[5000000,10000000]);
    				break;
    			case '3':
    				$product=$product->where('products.sellprice','>',10000000);
    				break;
    			
    		}
    		$brand=$request->brand;
    		
    		$product=$product->where('products.brands_id',$brand);


    	}
    	switch ($tempt) {
    		case '0':
    			$product=$product->paginate(6);
    			break;
    		case '1':
    			$product=$product->paginate(6)->appends('sort',request('sort'));
    			break;
    		case '2':
    			$product=$product->paginate(6)->appends('price',request('price'));
    			break;
    		case '3':
    			$product=$product->paginate(6)->appends('brand',request('brand'));
    			break;
    		case '4':
    			$product=$product->paginate(6)->appends('sort',request('sort'))->appends('price',request('price'));
    			break;
    		case '5':
    			$product=$product->paginate(6)->appends('sort',request('sort'))->appends('brand',request('brand'));
    			break;
    		case '6':
    			$product=$product->paginate(6)->appends('brand',request('brand'))->appends('price',request('price'));
    			break;
    		case '7':
    			$product=$product->paginate(6)->appends('sort',request('sort'))->appends('price',request('price'))->appends('brand',request('brand'));
    			break;	
    		
    	}
    	return view('fontend.page.list-product')->with('product',$product)->with('i',1);
    	
    }
    public function all_female_product(Request $request){
        $product=DB::table('products')->join('brands','products.brands_id','=','brands.id')->join('image_product','products.id','=','image_product.products_id')->join('info_product','products.id','=','info_product.products_id')->where('image_product.level',1)->whereIn('info_product.gender',[0,10])->select('products.*','image_product.image');
        $tempt=0;
        if($request->has('sort')){
            $tempt=1;
            $sort=$request->sort;
            switch ($sort) {

                case 'id':
                $product=$product->orderBy('products.id','DESC');
                break;

                case 'name':
                $product=$product->orderBy('products.name','DESC');
                break;

                case 'price_asc':

                $product=$product->orderBy('sellprice','ASC');
                break;

                case 'price_desc':
                $product=$product->orderBy('sellprice','DESC');
                break;

                default:
                $product=$product->orderBy('id','DESC');
                break;
            }
        
         }
        if($request->has('price')){
            $price=$request->price;
            $tempt=2;
            switch ($price) {
                case '1':
                    $product=$product->where('products.sellprice','<',5000000);
                    break;
                case '2':
                    $product=$product->whereBetween('products.sellprice',[5000000,10000000]);
                    break;
                case '3':
                    $product=$product->where('products.sellprice','>',10000000);
                    break;
                
            }
        }
        if($request->has('brand')){
            $brand=$request->brand;
            $tempt=3;
            $product=$product->where('products.brands_id',$brand);
        }
        if($request->has('sort') && $request->has('price')){
            $tempt=4;
            $sort=$request->sort;
            switch ($sort) {

                case 'id':
                $product=$product->orderBy('products.id','DESC');
                break;

                case 'name':
                $product=$product->orderBy('products.name','DESC');
                break;

                case 'price_asc':

                $product=$product->orderBy('sellprice','ASC');
                break;

                case 'price_desc':
                $product=$product->orderBy('sellprice','DESC');
                break;

                default:
                $product=$product->orderBy('id','DESC');
                break;
            }
            $price=$request->price;
            switch ($price) {
                case '1':
                    $product=$product->where('products.sellprice','<',5000000);
                    break;
                case '2':
                    $product=$product->whereBetween('products.sellprice',[5000000,10000000]);
                    break;
                case '3':
                    $product=$product->where('products.sellprice','>',10000000);
                    break;
                
            }
        }
        if($request->has('sort') && $request->has('brand')){
            $tempt=5;
            $sort=$request->sort;
            switch ($sort) {

                case 'id':
                $product=$product->orderBy('products.id','DESC');
                break;

                case 'name':
                $product=$product->orderBy('products.name','DESC');
                break;

                case 'price_asc':

                $product=$product->orderBy('sellprice','ASC');
                break;

                case 'price_desc':
                $product=$product->orderBy('sellprice','DESC');
                break;

                default:
                $product=$product->orderBy('id','DESC');
                break;
            }
            $brand=$request->brand;
            
            $product=$product->where('products.brands_id',$brand);

        }
        if($request->has('price') && $request->has('brand')){
            $tempt=6;
            $price=$request->price;
            switch ($price) {
                case '1':
                    $product=$product->where('products.sellprice','<',5000000);
                    break;
                case '2':
                    $product=$product->whereBetween('products.sellprice',[5000000,10000000]);
                    break;
                case '3':
                    $product=$product->where('products.sellprice','>',10000000);
                    break;
                
            }
            $brand=$request->brand;
            
            $product=$product->where('products.brands_id',$brand);
        }
        if($request->has('sort') && $request->has('price') && $request->has('brand')){
            $tempt=7;
            $sort=$request->sort;
            switch ($sort) {

                case 'id':
                $product=$product->orderBy('products.id','DESC');
                break;

                case 'name':
                $product=$product->orderBy('products.name','DESC');
                break;

                case 'price_asc':

                $product=$product->orderBy('sellprice','ASC');
                break;

                case 'price_desc':
                $product=$product->orderBy('sellprice','DESC');
                break;

                default:
                $product=$product->orderBy('id','DESC');
                break;
            }
            $price=$request->price;
            switch ($price) {
                case '1':
                    $product=$product->where('products.sellprice','<',5000000);
                    break;
                case '2':
                    $product=$product->whereBetween('products.sellprice',[5000000,10000000]);
                    break;
                case '3':
                    $product=$product->where('products.sellprice','>',10000000);
                    break;
                
            }
            $brand=$request->brand;
            
            $product=$product->where('products.brands_id',$brand);


        }
        switch ($tempt) {
            case '0':
                $product=$product->paginate(6);
                break;
            case '1':
                $product=$product->paginate(6)->appends('sort',request('sort'));
                break;
            case '2':
                $product=$product->paginate(6)->appends('price',request('price'));
                break;
            case '3':
                $product=$product->paginate(6)->appends('brand',request('brand'));
                break;
            case '4':
                $product=$product->paginate(6)->appends('sort',request('sort'))->appends('price',request('price'));
                break;
            case '5':
                $product=$product->paginate(6)->appends('sort',request('sort'))->appends('brand',request('brand'));
                break;
            case '6':
                $product=$product->paginate(6)->appends('brand',request('brand'))->appends('price',request('price'));
                break;
            case '7':
                $product=$product->paginate(6)->appends('sort',request('sort'))->appends('price',request('price'))->appends('brand',request('brand'));
                break;  
            
        }
        return view('fontend.page.list-product')->with('product',$product)->with('i',2);


    } 
    public function all_female_product_brand(Request $request,$id){
        $product=DB::table('products')->join('brands','products.brands_id','=','brands.id')->join('image_product','products.id','=','image_product.products_id')->join('info_product','products.id','=','info_product.products_id')->where('products.brands_id',$id)->whereIn('info_product.gender',[0,10])->where('image_product.level',1)->select('products.*','image_product.image');

        $tempt=0;
        if($request->has('sort')){
            $tempt=1;
            $sort=$request->sort;
            switch ($sort) {

                case 'id':
                $product=$product->orderBy('products.id','DESC');
                break;

                case 'name':
                $product=$product->orderBy('products.name','DESC');
                break;

                case 'price_asc':

                $product=$product->orderBy('sellprice','ASC');
                break;

                case 'price_desc':
                $product=$product->orderBy('sellprice','DESC');
                break;

                default:
                $product=$product->orderBy('id','DESC');
                break;
            }
        
         }
        if($request->has('price')){
            $price=$request->price;
            $tempt=2;
            switch ($price) {
                case '1':
                    $product=$product->where('products.sellprice','<',5000000);
                    break;
                case '2':
                    $product=$product->whereBetween('products.sellprice',[5000000,10000000]);
                    break;
                case '3':
                    $product=$product->where('products.sellprice','>',10000000);
                    break;
                
            }
        }
        if($request->has('brand')){
            $brand=$request->brand;
            $tempt=3;
            $product=$product->where('products.brands_id',$brand);
        }
        if($request->has('sort') && $request->has('price')){
            $tempt=4;
            $sort=$request->sort;
            switch ($sort) {

                case 'id':
                $product=$product->orderBy('products.id','DESC');
                break;

                case 'name':
                $product=$product->orderBy('products.name','DESC');
                break;

                case 'price_asc':

                $product=$product->orderBy('sellprice','ASC');
                break;

                case 'price_desc':
                $product=$product->orderBy('sellprice','DESC');
                break;

                default:
                $product=$product->orderBy('id','DESC');
                break;
            }
            $price=$request->price;
            switch ($price) {
                case '1':
                    $product=$product->where('products.sellprice','<',5000000);
                    break;
                case '2':
                    $product=$product->whereBetween('products.sellprice',[5000000,10000000]);
                    break;
                case '3':
                    $product=$product->where('products.sellprice','>',10000000);
                    break;
                
            }
        }
        if($request->has('sort') && $request->has('brand')){
            $tempt=5;
            $sort=$request->sort;
            switch ($sort) {

                case 'id':
                $product=$product->orderBy('products.id','DESC');
                break;

                case 'name':
                $product=$product->orderBy('products.name','DESC');
                break;

                case 'price_asc':

                $product=$product->orderBy('sellprice','ASC');
                break;

                case 'price_desc':
                $product=$product->orderBy('sellprice','DESC');
                break;

                default:
                $product=$product->orderBy('id','DESC');
                break;
            }
            $brand=$request->brand;
            
            $product=$product->where('products.brands_id',$brand);

        }
        if($request->has('price') && $request->has('brand')){
            $tempt=6;
            $price=$request->price;
            switch ($price) {
                case '1':
                    $product=$product->where('products.sellprice','<',5000000);
                    break;
                case '2':
                    $product=$product->whereBetween('products.sellprice',[5000000,10000000]);
                    break;
                case '3':
                    $product=$product->where('products.sellprice','>',10000000);
                    break;
                
            }
            $brand=$request->brand;
            
            $product=$product->where('products.brands_id',$brand);
        }
        if($request->has('sort') && $request->has('price') && $request->has('brand')){
            $tempt=7;
            $sort=$request->sort;
            switch ($sort) {

                case 'id':
                $product=$product->orderBy('products.id','DESC');
                break;

                case 'name':
                $product=$product->orderBy('products.name','DESC');
                break;

                case 'price_asc':

                $product=$product->orderBy('sellprice','ASC');
                break;

                case 'price_desc':
                $product=$product->orderBy('sellprice','DESC');
                break;

                default:
                $product=$product->orderBy('id','DESC');
                break;
            }
            $price=$request->price;
            switch ($price) {
                case '1':
                    $product=$product->where('products.sellprice','<',5000000);
                    break;
                case '2':
                    $product=$product->whereBetween('products.sellprice',[5000000,10000000]);
                    break;
                case '3':
                    $product=$product->where('products.sellprice','>',10000000);
                    break;
                
            }
            $brand=$request->brand;
            
            $product=$product->where('products.brands_id',$brand);


        }
        switch ($tempt) {
            case '0':
                $product=$product->paginate(6);
                break;
            case '1':
                $product=$product->paginate(6)->appends('sort',request('sort'));
                break;
            case '2':
                $product=$product->paginate(6)->appends('price',request('price'));
                break;
            case '3':
                $product=$product->paginate(6)->appends('brand',request('brand'));
                break;
            case '4':
                $product=$product->paginate(6)->appends('sort',request('sort'))->appends('price',request('price'));
                break;
            case '5':
                $product=$product->paginate(6)->appends('sort',request('sort'))->appends('brand',request('brand'));
                break;
            case '6':
                $product=$product->paginate(6)->appends('brand',request('brand'))->appends('price',request('price'));
                break;
            case '7':
                $product=$product->paginate(6)->appends('sort',request('sort'))->appends('price',request('price'))->appends('brand',request('brand'));
                break;  
            
        }
        return view('fontend.page.list-product')->with('product',$product)->with('i',2);


    } 

}
