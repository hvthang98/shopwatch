<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brands;

class BrandController extends Controller
{
    public function getAddBrand()
    {
        return view('backend.page.add-brand');
    }
    public function postBrand(AddBrandRequest $request)
    {
        $table = new Brands;
        $table->name = $request->name;
        $table->info = $request->content;
        $table->status = $request->status;
        $table->save();
        return redirect(route('listBrand'))->with('notification', 'Thêm thương hiệu thành công');
    }
    public function getListBrand()
    {
        $data['brands'] = Brands::paginate(10);
        return view('backend.page.list-brand', $data);
    }
    public function getEditBrand(Request $request)
    {
        $data['brand'] = Brands::find($request->id);
        return view('backend.page.edit-brand', $data);
    }
    public function updateBrand(UpdateBrandRequest $request)
    {
        $table = Brands::find($request->id);
        $table->name = $request->name;
        $table->info = $request->content;
        $table->status = $request->status;
        $table->save();
        return redirect(route('listBrand'))->with('notification', 'Cập nhật thông tin thương hiệu thành công');
    }
    public function delBrand(Request $request)
    {
        Brands::find($request->id)->delete();
        return redirect(route('listBrand'))->with('notification', 'Xóa thương hiệu thành công');
    }
}
