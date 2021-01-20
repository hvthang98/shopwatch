<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Brands;
use App\Http\Requests\AddProductRequest;
use App\Models\BrandCategories;
use App\Models\Categories;
use App\Models\ImgProduct;
use App\Models\Info_product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Products::orderBy('created_at', 'desc')->paginate(10);
        return view('backend.page.product.list-product', compact('products'));
    }

    public function create()
    {
        $brands = Brands::all();
        $categories = Categories::orderBy('ordernum', 'asc')->get();
        return view('backend.page.product.add-product', compact('brands','categories'));
    }

    public function store(AddProductRequest $req)
    {
        $price = str_replace([',', '.'], '', $req->price);
        $sellPrice = str_replace([',', '.'], '', $req->sellprice);
        $quantily = str_replace([',', '.'], '', $req->quantily);

        $product = new Products;
        $product->name = $req->name;
        $product->price = $price;
        $product->sellprice = $sellPrice;
        $product->quantily = $quantily;
        $product->content = $req->content;
        $product->status = $req->status;
        $product->ordernum = $req->ordernum;
        $category = $req->category;
        if ($category != 0) {
            if (isset($req->brands)) {
                $product->brands_id = $req->brands;
            }
            $product->categories_id = $category;
        }
        if (isset($req->tags)) {
            $tags = implode(',', $req->tags);
            $product->tags = $tags;
        }
        $product->save();

        if (isset($req->image)) {
            $path = $req->file('image')->store('product/'.date('Y_m_d').'_' . ($product->id).'_product');
            $img = new ImgProduct;
            $img->image = $path;
            $img->status = 1;
            $img->level = 1;
            $img->products_id = $product->id;
            $img->save();
        }
        return redirect(route('admin.product.index'))->with('notification', 'Thêm sản phẩm thành công');
    }

    public function edit(Request $request)
    {
        $product = Products::find($request->id);
        $categories = Categories::orderBy('ordernum', 'asc')->get();
        $brands = Brands::all();
        $info_product= json_decode($product->infor);
        return view('backend.page.product.edit-product', compact('product','categories','brands','info_product'));
    }

    public function update(Request $req)
    {
        $price=str_replace([',', '.'], '', $req->price);
        $sellPrice=str_replace([',', '.'], '', $req->sellprice);
        $quantily=str_replace([',', '.'], '', $req->quantily);

        $table = Products::find($req->id);
        $table->name = $req->name;
        $table->price = $price;
        $table->sellprice = $sellPrice;
        $table->quantily = $quantily;
        $table->content = $req->content;
        $table->ordernum = $req->ordernum;
        $table->status = $req->status;
        $table->categories_id = $req->category;
        $table->brands_id = $req->brands;
        if (isset($req->tags)) {
            $tags = implode(',', $req->tags);
            $table->tags = $tags;
        }
        $table->save();
        return redirect()->back()->with('notification', 'Thay đổi thông tin sản phẩm thành công');
    }

    public function destroy(Request $request)
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
