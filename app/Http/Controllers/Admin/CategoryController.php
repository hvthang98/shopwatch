<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BrandCategories;
use App\Models\Brands;
use Illuminate\Http\Request;
use App\Models\Categories;

class CategoryController extends Controller
{
	function add_category()
	{
		$data['categories'] = Categories::orderBy('ordernum', 'asc')->get();
		return view('backend.page.category.add-category', $data);
	}

	function post_add_category(Request $request)
	{
		$request->validate(['category_name' => 'required']);
		$ordernum = $request->ordernum;
		$list = Categories::where('ordernum', '>', $ordernum)->get();
		foreach ($list as $item) {
			$item->ordernum = $item->ordernum + 1;
			$item->save();
		}
		$category = new Categories();
		$category->name = $request->category_name;
		$category->status = $request->status;
		$category->ordernum = $ordernum + 1;
		$category->save();
		return redirect()->route('all-category')->with(['notification' => 'Đã thêm danh mục thành công']);
	}

	function all_category()
	{
		$categories = Categories::orderBy('ordernum', 'asc')->paginate(10);
		$brand = Brands::all();
		$stt = $categories->firstItem();
		return view('backend.page.category.all-category', ['categories' => $categories, 'stt' => $stt, 'brands' => $brand]);
	}
	function edit_category($id)
	{
		$category = Categories::find($id);
		$categories = Categories::orderBy('ordernum', 'asc')->get();

		return view('backend.page.category.edit-category', ['category' => $category, 'categories' => $categories]);
	}
	function post_edit_category(Request $request, $id)
	{
		$name = $request->edit_category_name;
		$status = $request->edit_status;
		$category = Categories::find($id);
		$ordernum = $request->ordernum;
		if ($ordernum != 'null') {
			$list = Categories::where('ordernum', '>', $ordernum)->get();
			foreach ($list as $item) {
				$item->ordernum = $item->ordernum + 1;
				$item->save();
			}
			$category->ordernum = $ordernum + 1;
		}
		$category->name = $name;
		$category->status = $status;
		$category->save();
		return redirect('admin/category/all-category')->with(['notification' => 'Đã cập nhật danh mục thành công']);
	}

	function delete_category($id)
	{
		Categories::find($id)->delete();
		return redirect('admin/category/all-category/')->with(['notification' => 'Đã xóa danh mục thành công']);
	}

	function active_category($id)
	{
		$category = Categories::find($id);
		$category->status = 1;
		$category->save();
		return redirect()->back();
	}

	function unactive_category($id)
	{
		$category = Categories::find($id);
		$category->status = 0;
		$category->save();
		return redirect()->back();
	}
	public function storeBrand(Request $req)
	{
		BrandCategories::firstOrCreate(['categories_id' => $req->category, 'brands_id' => $req->brand]);
		return redirect()->back();
	}
	public function deleteBrand(Request $req)
	{
		BrandCategories::where('categories_id', $req->idCate)->where('brands_id', $req->idBrand)->delete();
		return redirect()->back();
	}
}
