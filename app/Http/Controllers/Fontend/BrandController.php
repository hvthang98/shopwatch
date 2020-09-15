<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use App\Models\BrandCategories;
use Illuminate\Http\Request;
use Illuminate\Support\collection;
use App\Models\Brands;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
	public function product_of_brand(Request $req, $idBrand = null)
	{
		//get brand
		$brand = Brands::find($req->idBrand);
		$product = Products::where('categories_id', $req->idCategory);
		if ($req->idBrand != null) {
			$product = $product->where('brands_id', $req->idBrand);
		}
		$categories = Categories::where('status', 1)->orderBy('ordernum', 'asc')->get();
		if ($req->has('sort')) {
			$sort = $req->sort;
			switch ($sort) {
				case 'id':
					$product = $product->orderBy('created_at', 'DESC');
					break;
				case 'name':
					$product = $product->orderBy('name', 'desc');
					break;
				case 'price_asc':
					$product = $product->orderBy('sellprice', 'ASC');
					break;
				case 'price_desc':
					$product = $product->orderBy('sellprice', 'DESC');
					break;
				default:
					$product = $product->orderBy('created_at', 'DESC');
					break;
			}
		}
		//2.lọc sản phẩm theo khoảng giá
		if ($req->has('pri')) {
			$pri = $req->pri;
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
		$data['products'] = $product->paginate(12);
		$data['brands'] = $brand;
		$data['categories'] = $categories;
		$data['idCategory']=$req->idCategory;
		return view('fontend.page.list-product-of-brand', $data);
	}
}
