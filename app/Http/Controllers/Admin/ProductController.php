<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Brands;
use App\Http\Requests\AddProductRequest;
use App\Models\ImgProduct;
use App\Models\Info_product;

class ProductController extends Controller
{
    //product
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
        $product->quantily= $request->quantily;
        $product->content = $request->content;
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

        // create information product on info_product table

        $info = new Info_product;
        $info->products_id = $product->id;
        $info->brands_id=$product->brands_id;
        $info->save();
        return redirect(route('listProduct'))->with('notification', 'Thêm sản phẩm thành công');
    }

    // function show, edit list product
    public function getListProduct()
    {
        $data['products'] = Products::orderBy('id', 'desc')->paginate(10);
        return view('backend.page.list-product', $data);
    }

    // edit product
    public function getEditProduct(Request $request)
    {

        $data['product'] = Products::find($request->id);
        $data['brands'] = Brands::all();
        $data['info_product']=Info_product::where('products_id',$request->id)->get()->first();

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
        Products::find($request->id)->delete();
        return redirect()->back();
    }
    // add and update infor product
    public function updateInfoProduct(Request $request)
    {   
       
        $table=Info_product::where('products_id',$request->id)->get();
        foreach($table as $items){
        $items->gender=$request->gender;
        $items->type=$request->type;
        $items->glass_material=$request->glass_material;
        $items->frames=$request->frames;
        $items->waterproof=$request->waterproof;
        $items->diameter=$request->diameter;
        $items->thickness=$request->thickness;
        $items->strap_material=$request->strap_material;
        $items->strap_width=$request->strap_width;
        $items->strap_change=$request->strap_change;
        $items->expiry_date=$request->expiry_date;
        $items->address=$request->address;

        $items->save();
        }
        return redirect()->back()->with('notification','Thay đổi thông tin kỹ thuật thành công');
    }

    // image product
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
