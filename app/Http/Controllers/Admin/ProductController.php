<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Brands;
use App\Http\Requests\AddProductRequest;
use App\Models\ImgProduct;

class ProductController extends Controller
{
    // function add product
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
        if (isset($request->content)) {
            $product->content = $request->content;
        }
        $product->status = $request->status;
        $product->ordernum = $request->ordernum;
        $product->brands_id = $request->brands_id;
        $product->save();

        if (isset($request->image)) {
            $file = $request->image;
            $fileName = 'public/upload/' . $file->getClientOriginalName();
            $img = new ImgProduct;
            $img->image = $fileName;
            $img->status = 1;
            $img->level = 1;
            $img->products_id = $product->id;
            $img->save();
            $file->move('public/upload', $file->getClientOriginalName());
        }
        return redirect(route('addProduct'))->with('notify', 'Thêm sản phẩm thành công');
    }

    // function show, edit list product
    public function getListProduct()
    {
        $data['products'] = Products::all();
        return view('backend.page.list-product', $data);
    }

    //function get image product
    public function getImageProduct(Request $request)
    {
        $data['images'] = ImgProduct::where('products_id', $request->id)->orderBy('level', 'desc')->paginate(5);
        $data['products_id'] = $request->id;
        return view('backend.page.image-product', $data);
    }
    // function add image product
    public function addImageProuct(Request $request)
    {
        if (isset($request->image)) {
            $file = $request->image;
            $fileName = 'public/upload/' . $file->getClientOriginalName();
            $img = new ImgProduct;
            $img->image = $fileName;
            $img->status = 1;
            $img->level = 0;
            $img->products_id = $request->id;
            $img->save();
            $file->move('public/upload', $file->getClientOriginalName());
            return redirect()->back();
        } else {
            return redirect()->back()->withErrors('File not found');
        }
    }

    public function delImageProduct(Request $request)
    {
        $data = ImgProduct::where('id', $request->id)->delete();
        return redirect()->back();
    }
    // update image product / change status image product
    public function updateTmageProduct(Request $request)
    {
        $table = ImgProduct::find($request->id);
        if ($request->status == 1) {
            $table->status = 0;
            $table->save();
        } else {
            $table->status = 1;
            $table->save();
        }
        return redirect()->back();
    }
    //change avatar
    public function changeAvatar(Request $request)
    {
        $table = ImgProduct::where('products_id', $request->products_id)->get();
        foreach ($table as $items) {
            $items->level = 0;
            $items->save();
        }

        $table = ImgProduct::find($request->image_id);
        $table->level = 1;
        $table->save();
        return redirect()->back();
    }
}
