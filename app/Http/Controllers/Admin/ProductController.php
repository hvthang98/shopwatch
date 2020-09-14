<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Brands;
use App\Http\Requests\AddProductRequest;
use App\Models\ImgProduct;
use App\Models\Info_product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function getAddProduct()
    {
        $data['brands'] = Brands::all();
        return view('backend.page.add-product', $data);
    }
    public function postProduct(AddProductRequest $request)
    {
        $product = new Products;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->sellprice = $request->sellprice;
        $product->quantily = $request->quantily;
        $product->content = $request->content;
        $product->status = $request->status;
        $product->ordernum = $request->ordernum;
        $product->brands_id = $request->brands_id;
        $product->save();

        if (isset($request->image)) {
            $path = $request->file('image')->store('product' . ($product->id));
            $img = new ImgProduct;
            $img->image = $path;
            $img->status = 1;
            $img->level = 1;
            $img->products_id = $product->id;
            $img->save();
        }
        return redirect(route('listProduct'))->with('notification', 'Thêm sản phẩm thành công');
    }

    // function show, edit list product
    public function getListProduct()
    {
        $data['products'] = Products::orderBy('created_at', 'desc')->paginate(10);
        return view('backend.page.list-product', $data);
    }

    // edit product
    public function getEditProduct(Request $request)
    {
        $product = Products::find($request->id);
        $data['product'] = $product;
        $data['brands'] = Brands::all();
        $data['info_product'] = json_decode($product->infor);
        if (isset($product->infor)) {
            $count = count(json_decode($product->infor));
        } else {
            $count = 0;
        }
        $data['countInfor'] = $count;
        return view('backend.page.edit-product', $data);
    }
    //update product
    public function updateProduct(Request $request)
    {
        $table = Products::find($request->id);
        $table->name = $request->name;
        $table->price = $request->price;
        $table->sellprice = $request->sellprice;
        $table->quantily = $request->quantily;
        $table->brands_id = $request->brands_id;
        $table->content = $request->content;
        $table->ordernum = $request->ordernum;
        $table->status = $request->status;
        $table->save();
        return redirect()->back()->with('notification', 'Thay đổi thông tin sản phẩm thành công');
    }
    //delete product
    public function delProduct(Request $request)
    {
        $product = Products::find($request->id);
        $path = 'product' . ($request->id);
        Storage::deleteDirectory($path);
        $product->delete();
        return redirect()->back()->with('notification', 'Xóa sản phẩm thành công');
    }
    // add and update infor product
    public function updateInfoProduct(Request $request)
    {
        $product = Products::find($request->id);
        $product->infor = $request->content;
        $product->save();
        return true;
    }
}
