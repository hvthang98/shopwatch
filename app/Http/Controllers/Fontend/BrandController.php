<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\collection;
use App\Models\Brands;
use App\Models\Products;
use App\Models\Info_product;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
	public function product_of_brand(Request $request, $id)
	{

		//get brand
		$brand = Brands::where('id',$id)->get();

		$product = DB::table('brands')->join('products', 'brands.id', '=', 'products.brands_id')->join('image_product', 'products.id', '=', 'image_product.products_id')->join('info_product', 'products.id', '=', 'info_product.products_id')->where('products.brands_id', $id)->where('image_product.level', 1);
		$tempt = 0;
		//phần lọc danh sách sản phẩm
		
		//1. sắp xếp sản phẩm theo tên ,giá
		if ($request->has('sort')) {
			$tempt = 1;
			$sort = $request->sort;
			switch ($sort) {

				case 'id':
					$product = $product->orderBy('products.id', 'DESC');
					break;

				case 'name':
					$product = $product->orderBy('products.name', 'DESC');
					break;

				case 'price_asc':

					$product = $product->orderBy('sellprice', 'ASC');
					break;

				case 'price_desc':
					$product = $product->orderBy('sellprice', 'DESC');
					break;

				default:
					$product = $product->orderBy('id', 'DESC');
					break;
			}
		}
		//2.lọc sản phẩm theo khoảng giá
		if ($request->has('pri')) {
			$tempt = 2;
			$pri = $request->pri;
			switch ($pri) {
				case '1':
					$product = $product->where('sellprice', '<', 5000000);
					break;

				case '2':
					$product = $product->whereBetween('sellprice', [5000000, 10000000]);
					break;

				case '3':
					$product = $product->where('sellprice', '>', 10000000);
					break;
			}
		}
		//lọc sản phẩm theo giới tính
		if ($request->has('gender')) {
			$tempt = 3;
			$gender = $request->gender;
			switch ($gender) {
				case '1':
					$product = $product->where('gender', 1);
					break;
				case '2':
					$product = $product->where('gender', 0);
					break;
				case '10':
					$product = $product->where('gender', 10);
					break;
			}
		}
		//lọc kết hợp nhiều điều kiện
		if ($request->has('pri') && $request->has('sort')) {
			$tempt = 4;
			$sort = $request->sort;
			switch ($sort) {

				case 'id':
					$product = $product->orderBy('products.id', 'DESC');
					break;

				case 'name':
					$product = $product->orderBy('products.name', 'DESC');
					break;

				case 'price_asc':

					$product = $product->orderBy('sellprice', 'ASC');
					break;

				case 'price_desc':
					$product = $product->orderBy('sellprice', 'DESC');
					break;

				default:
					$product = $product->orderBy('id', 'DESC');
					break;
			}
			$pri = $request->pri;
			switch ($pri) {
				case '1':
					$product = $product->where('sellprice', '<', 5000000);
					break;

				case '2':
					$product = $product->whereBetween('sellprice', [5000000, 10000000]);
					break;

				case '3':
					$product = $product->where('sellprice', '>', 10000000);
					break;
			}
		}
		if ($request->has('sort') && $request->has('gender')) {
			$tempt = 5;
			$sort = $request->sort;
			switch ($sort) {

				case 'id':
					$product = $product->orderBy('products.id', 'DESC');
					break;

				case 'name':
					$product = $product->orderBy('products.name', 'DESC');
					break;

				case 'price_asc':

					$product = $product->orderBy('sellprice', 'ASC');
					break;

				case 'price_desc':
					$product = $product->orderBy('sellprice', 'DESC');
					break;

				default:
					$product = $product->orderBy('id', 'DESC');
					break;
			}
			$gender = $request->gender;
			switch ($gender) {
				case '1':
					$product = $product->where('gender', 1);
					break;
				case '2':
					$product = $product->where('gender', 2);
					break;
				case '10':
					$product = $product->where('gender', 10);
					break;
			}
		}
		if ($request->has('pri') && $request->has('gender')) {
			$tempt = 6;
			$pri = $request->pri;
			switch ($pri) {
				case '1':
					$product = $product->where('sellprice', '<', 5000000);
					break;

				case '2':
					$product = $product->whereBetween('sellprice', [5000000, 10000000]);
					break;

				case '3':
					$product = $product->where('sellprice', '>', 10000000);
					break;
			}
			$gender = $request->gender;
			switch ($gender) {
				case '1':
					$product = $product->where('gender', 1);
					break;
				case '2':
					$product = $product->where('gender', 2);
					break;
				case '10':
					$product = $product->where('gender', 10);
					break;
			}
		}
		if ($request->has('sort') && $request->has('pri') && $request->has('gender')) {
			$tempt = 7;
			$sort = $request->sort;
			switch ($sort) {

				case 'id':
					$product = $product->orderBy('products.id', 'DESC');
					break;

				case 'name':
					$product = $product->orderBy('products.name', 'DESC');
					break;

				case 'price_asc':

					$product = $product->orderBy('sellprice', 'ASC');
					break;

				case 'price_desc':
					$product = $product->orderBy('sellprice', 'DESC');
					break;

				default:
					$product = $product->orderBy('id', 'DESC');
					break;
			}
			$pri = $request->pri;
			switch ($pri) {
				case '1':
					$product = $product->where('sellprice', '<', 5000000);
					break;

				case '2':
					$product = $product->whereBetween('sellprice', [5000000, 10000000]);
					break;

				case '3':
					$product = $product->where('sellprice', '>', 10000000);
					break;
			}
			$gender = $request->gender;
			switch ($gender) {
				case '1':
					$product = $product->where('gender', 1);
					break;
				case '2':
					$product = $product->where('gender', 2);
					break;
				case '10':
					$product = $product->where('gender', 10);
					break;
			}
		}

		//gắn link phân trang 
		switch ($tempt) {
			case 1:
				$product = $product->paginate(6)->appends('sort', request('sort'));
				break;
			case 2:
				$product = $product->paginate(6)->appends('pri', request('pri'));
				break;
			case 3:
				$product = $product->paginate(6)->appends('gender', request('gender'));
				break;
			case 4:
				$product = $product->paginate(6)->appends('sort', request('sort'))->appends('pri', request('pri'));
				break;
			case 5:
				$product = $product->paginate(6)->appends('gender', request('gender'))->appends('sort', request('sort'));
				break;
			case 6:
				$product = $product->paginate(6)->appends('gender', request('gender'))->appends('pri', request('pri'));
				break;
			case 7:
				$product = $product->paginate(6)->appends('gender', request('gender'))->appends('pri', request('pri'))->appends('sort', request('sort'));
				break;
			default:
				$product = $product->paginate(6);
				break;
		}

		return view('fontend.page.list-product-of-brand')->with('brand', $brand)->with('product', $product);
	}
}
