<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\{Brand, Product};

class BrandController extends Controller
{
    protected $limit = 15;

    public function index()
    {
        $data['brands'] = Brand::paginate($this->limit);
        return view('backend.brands.index', $data);
    }

    public function create()
    {
        return view('backend.brands.create');
    }

    public function store(AddBrandRequest $request)
    {
        $table = new Brand;
        $table->name = $request->name;
        $table->description = $request->content;
        $table->status = $request->status;
        $table->save();
        return redirect(route('admin.brand.index'))->with('notification', 'Thêm thương hiệu thành công');
    }

    public function edit(Request $request)
    {
        $data['brand'] = Brand::find($request->id);
        return view('backend.brands.edit', $data);
    }

    public function update(UpdateBrandRequest $request)
    {
        $table = Brand::find($request->id);
        $table->name = $request->name;
        $table->description = $request->content;
        $table->status = $request->status;
        $table->save();
        return redirect(route('admin.brand.index'))->with('notification', 'Cập nhật thông tin thương hiệu thành công');
    }

    public function destroy(Request $request)
    {
        Brand::find($request->id)->delete();
        return redirect(route('admin.brand.index'))->with('notification', 'Xóa thương hiệu thành công');
    }

    public function getListProduct($id)
    {
        $products = Product::where('brand_id', $id)->paginate(12);
        return view('backend.page.brand.list_product', compact('products'));
    }
}
