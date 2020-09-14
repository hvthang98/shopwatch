<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ImgProduct;
use Illuminate\Support\Facades\Storage;

class ImageProductController extends Controller
{
    // image product
    public function index(Request $request)
    {
        $data['images'] = ImgProduct::where('products_id', $request->id)->orderBy('created_at','desc')->paginate(5);
        $data['products_id'] = $request->id;
        return view('backend.page.image-product', $data);
    }
    // function add image product
    public function store(Request $request)
    {
        if (isset($request->image)) {
            $path = $request->file('image')->store('product' . ($request->id));
            $img = new ImgProduct;
            $img->image = $path;
            $img->status = 1;
            $img->level = 0;
            $img->products_id = $request->id;
            $img->save();
            return redirect()->back();
        } else {
            return redirect()->back()->withErrors('File not found');
        }
    }

    public function delete(Request $request)
    {
        $data = ImgProduct::find($request->id);
        Storage::delete($data->image);
        $data->delete();
        return redirect()->back();
    }
    // update image product / change status image product
    public function update(Request $request)
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
