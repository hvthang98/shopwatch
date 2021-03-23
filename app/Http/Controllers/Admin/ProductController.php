<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Brands;
use App\Http\Requests\{AddProductRequest,UpdateProductRequest};
use App\Models\Categories;
use App\Models\ImgProduct;
use Illuminate\Support\Facades\Storage;
use App\Repositories\Products\ProductRepository;

class ProductController extends Controller
{
    protected $model;

    public function __construct(ProductRepository $product){
        $this->model = $product;
    }

    public function index()
    {
        $products = $this->model->getData(10);
        return view('backend.page.product.list-product', compact('products'));
    }

    public function create()
    {
        $brands = Brands::all();
        $categories = Categories::orderBy('ordernum', 'asc')->get();
        return view('backend.page.product.add-product', compact('brands','categories'));
    }

    public function store(AddProductRequest $request)
    {
        $this->model->store($request);
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

    public function update(UpdateProductRequest $request,$id)
    {
        $this->model->update($request,$id);
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

    public function updateInfoProduct(Request $request)
    {
        $product = Products::find($request->id);
        $product->infor = $request->content;
        $product->save();
        return true;
    }
}
