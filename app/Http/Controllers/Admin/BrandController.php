<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brands;
use App\Models\Products;

class BrandController extends Controller
{
    public function index()
    {
        $data['brands'] = Brands::paginate(10);
        return view('backend.page.brand.list-brand', $data);
    }

    public function create()
    {
        return view('backend.page.brand.add-brand');
    }

    public function store(AddBrandRequest $request)
    {
        $table = new Brands;
        $table->name = $request->name;
        $table->info = $request->content;
        $table->status = $request->status;
        $table->save();
        return redirect(route('admin.brand.index'))->with('notification', 'Thêm thương hiệu thành công');
    }

    public function edit(Request $request)
    {
        $data['brand'] = Brands::find($request->id);
        return view('backend.page.brand.edit-brand', $data);
    }

    public function update(UpdateBrandRequest $request)
    {
        $table = Brands::find($request->id);
        $table->name = $request->name;
        $table->info = $request->content;
        $table->status = $request->status;
        $table->save();
        return redirect(route('admin.brand.index'))->with('notification', 'Cập nhật thông tin thương hiệu thành công');
    }

    public function destroy(Request $request)
    {
        Brands::find($request->id)->delete();
        return redirect(route('admin.brand.index'))->with('notification', 'Xóa thương hiệu thành công');
    }

    public function getListProduct($id)
    {
        $products = Products::where('brands_id', $id)->paginate(12);
        return view('backend.page.brand.list_product', compact('products'));
    }
}
