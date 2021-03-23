<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ImgProduct;
use Illuminate\Support\Facades\Storage;
use App\Repositories\ImgProducts\ImgProductRepository;
use Illuminate\Support\Facades\Session;

class ImageProductController extends Controller
{
    protected $model;

    public function __construct(ImgProductRepository $img)
    {
        $this->model = $img;
    }

    public function index(Request $request)
    {
        $images = $this->model->getData($request->id, 5, 'created_at');
        $products_id = $request->id;
        return view('backend.page.product.image-product', compact('images', 'products_id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpeg,jpg,png,gif',
        ]);
        $this->model->store($request);
        Session::flash('notification','Lưu ảnh thành công');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->model->destroy($id);
        Session::flash('notification','Xóa ảnh thành công');
        return redirect()->back();
    }

    public function updateStatus(Request $request)
    {
        if (isset($request->status)) {
            $data = [
                'status' => $request->status,
            ];
            $this->model->update($data, $request->id);
        }
        return response()->json([
            'success' => true,
            'message' =>'Cập nhật trạng thái thành công',
        ]);
    }
    //change avatar
    public function changeAvatar(Request $request)
    {
        $this->model->changeAvatar($request);
        Session::flash('notification','Thay đổi avatar thành công');
        return redirect()->back();
    }
}
