<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BrandCategories;
use App\Models\Brands;
use Illuminate\Http\Request;
use App\Models\Categories;

class CategoryController extends Controller
{
	public function index()
	{
		$categories = Categories::orderBy('ordernum', 'asc')->paginate(10);
		$brand = Brands::all();
		$stt = $categories->firstItem();
		return view('backend.page.category.all-category', ['categories' => $categories, 'stt' => $stt, 'brands' => $brand]);
	}

	public function create()
	{
		$data['categories'] = Categories::orderBy('ordernum', 'asc')->get();
		return view('backend.page.category.add-category', $data);
	}

	public function store(Request $request)
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
		return redirect()->route('admin.category.index')->with(['notification' => 'Đã thêm danh mục thành công']);
	}
	
	public function edit($id)
	{
		$category = Categories::find($id);
		$categories = Categories::orderBy('ordernum', 'asc')->get();

		return view('backend.page.category.edit-category', ['category' => $category, 'categories' => $categories]);
	}
	public function update(Request $request, $id)
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
		return redirect()->route('admin.category.index')->with(['notification' => 'Đã cập nhật danh mục thành công']);
	}

	public function destroy($id)
	{
		Categories::find($id)->delete();
		return redirect()->route('admin.category.index')->with(['notification' => 'Đã xóa danh mục thành công']);
	}

	public function active($id)
	{
		try {
			$category = Categories::find($id);
			$category->status = 1;
			$category->save();
			return response()->json([
				'status' =>true,
				'code'=>200,
				'message' =>'Đã thay đổi trạng thái thành công',
			]);
		} catch (\Throwable $th) {
			return response()->json([
				'status' =>false,
				'code'=>500,
				'message'=>$th->getMessage(),
			]);
		}
	}

	public function unactive($id)
	{
		try {
			$category = Categories::find($id);
			$category->status = 0;
			$category->save();
			return response()->json([
				'status' =>true,
				'code'=>200,
				'message' =>'Đã thay đổi trạng thái thành công',
			]);
		} catch (\Throwable $th) {
			return response()->json([
				'status' =>false,
				'code'=>500,
				'message'=>$th->getMessage(),
			]);
		}
	}
	public function storeBrand(Request $req)
	{
		BrandCategories::firstOrCreate(['categories_id' => $req->category, 'brands_id' => $req->brand]);
		return redirect()->back();
	}
	public function deleteBrand($id)
	{
		$data=BrandCategories::find($id)->delete();
		return redirect()->back();
	}
}
