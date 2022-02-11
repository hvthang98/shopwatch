<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Product, Category, Brand};
use App\Http\Requests\{CreateProductRequest, UpdateProductRequest};
use Illuminate\Support\Facades\Storage;
use App\Repositories\Products\ProductRepository;

class ProductController extends Controller
{
    protected $model;

    public function __construct(ProductRepository $product)
    {
        $this->model = $product;
    }

    public function index()
    {
        $products = $this->model->getData(10);
        return view('backend.product.index', compact('products'));
    }

    public function create()
    {
        $brands = Brand::all();
        $categories = Category::get();
        return view('backend.product.create', compact('brands', 'categories'));
    }

    public function store(CreateProductRequest $request)
    {
        $this->model->store($request);
        return redirect(route('admin.product.index'))->with('notification', 'Thêm sản phẩm thành công');
    }

    public function edit(Request $request)
    {
        $product = Product::find($request->id);
        $categories = Category::get();
        $brands = Brand::all();
        $info_product = json_decode($product->infor);
        return view('backend.product.edit', compact('product', 'categories', 'brands', 'info_product'));
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $this->model->update($request, $id);
        return redirect()->back()->with('notification', 'Thay đổi thông tin sản phẩm thành công');
    }

    public function destroy(Request $request)
    {
        $product = Product::find($request->id);
        $path = 'product' . ($request->id);
        Storage::deleteDirectory($path);
        $product->delete();
        return redirect()->back()->with('notification', 'Xóa sản phẩm thành công');
    }

    public function updateInfoProduct(Request $request)
    {
        $product = Product::find($request->id);
        $product->infor = $request->content;
        $product->save();
        return true;
    }
}
