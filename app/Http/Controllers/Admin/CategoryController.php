<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Category, Product, Brand};

class CategoryController extends Controller
{
	public function index()
	{
		$categories = Category::paginate(10);
		$brands = Brand::all();
		return view('backend.categories.index', compact('categories', 'brands'));
	}

	public function create()
	{
		$data['categories'] = Category::get();
		return view('backend.categories.create', $data);
	}

	public function store(Request $request)
	{
		$request->validate(['category_name' => 'required']);
		$ordernum = $request->ordernum;
		$list = Category::where('ordernum', '>', $ordernum)->get();
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
		$category = Category::find($id);
		$categories = Category::get();

		return view('backend.categories.edit', compact('category', 'categories'));
	}

	public function update(Request $request, $id)
	{
		$name = $request->edit_category_name;
		$status = $request->edit_status;
		$category = Category::find($id);
		$ordernum = $request->ordernum;
		if ($ordernum != 'null') {
			$list = Category::where('ordernum', '>', $ordernum)->get();
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
		Category::find($id)->delete();
		return redirect()->route('admin.category.index')->with(['notification' => 'Đã xóa danh mục thành công']);
	}

	public function active($id)
	{
		try {
			$category = Category::find($id);
			$category->status = 1;
			$category->save();
			return response()->json([
				'status' => true,
				'code' => 200,
				'message' => 'Đã thay đổi trạng thái thành công',
			]);
		} catch (\Throwable $th) {
			return response()->json([
				'status' => false,
				'code' => 500,
				'message' => $th->getMessage(),
			]);
		}
	}

	public function unactive($id)
	{
		try {
			$category = Category::find($id);
			$category->status = 0;
			$category->save();
			return response()->json([
				'status' => true,
				'code' => 200,
				'message' => 'Đã thay đổi trạng thái thành công',
			]);
		} catch (\Throwable $th) {
			return response()->json([
				'status' => false,
				'code' => 500,
				'message' => $th->getMessage(),
			]);
		}
	}

	public function storeBrand(Request $req)
	{
		BrandCategory::firstOrCreate(['categories_id' => $req->category, 'brands_id' => $req->brand]);
		return redirect()->back();
	}

	public function deleteBrand($id)
	{
		$data = BrandCategory::find($id)->delete();
		return redirect()->back();
	}

	public function getListProduct($id)
	{
		$products = Products::where('categories_id', $id)->paginate(15);
		return view('backend.categories.list_product', compact('products'));
	}
}
