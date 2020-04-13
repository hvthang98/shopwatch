<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banners;

session_start();
class BannerController extends Controller
{
    //
    function add_banner()
    {
        return view('backend.page.banner.add-banner');
    }
    function post_add_banner(Request $request)
    {
        $request->validate(
            ['banner_name' => 'required', 'banner_image' => 'required|image', 'banner_odernum' => 'required'],

            []
        );

        $banner = new Banners();
        $banner->name = $request->banner_name;
        if (isset($request->banner_link)) {
            $banner->link = $request->banner_link;
        }
        $banner->status = $request->banner_status;
        $banner->ordernum = $request->banner_odernum;
        //hình ảnh
        $file_image = $request->banner_image;

        $file_name = $file_image->getClientOriginalName();
        $file_image->move('public/upload/images/', $file_name);
        $banner->image = $file_name;
        $banner->save();
        // $request->session()->flash('status', 'Đã thêm mới thành công!');

        return redirect('admin/all-banner')->with('status', 'Đã thêm mới thành công!');
    }
    function all_banner()
    {
        $banners = Banners::all();
        return view('backend.page.banner.all-banner', ['banners' => $banners]);
    }
    function active_banner($id)
    {
        $banner = Banners::find($id);
        $banner->status = 1;
        $banner->save();
        return redirect('admin/all-banner');
    }
    function unactive_banner($id)
    {
        $banner = Banners::find($id);
        $banner->status = 0;
        $banner->save();
        return redirect('admin/all-banner');
    }
    function edit_banner($id)
    {
        $banner = Banners::where('id', $id)->get();
        //dd($banner);
        return view('backend.page.banner.edit-banner', ['banners' => $banner]);
    }
    function post_edit_banner(Request $request, $id)
    {

        $banner = Banners::find($id);
        $banner->name = $request->edit_banner_name;
        $banner->link = $request->edit_banner_link;
        $banner->status = $request->edit_banner_status;
        $banner->ordernum = $request->edit_banner_ordernum;

        //hình ảnh
        $file_image = $request->edit_banner_img;
        if ($file_image) {
            $file_name = $file_image->getClientOriginalName();
            $file_image->move('public/backend/images/', $file_name);
            $banner->image = $file_name;
        }
        $banner->save();
        return redirect('admin/all-banner')->with('status', 'Đã cập nhật thành công!');
    }
    function delete_banner($id)
    {
        Banners::find($id)->delete();
        return redirect('admin/all-banner')->with('status', 'Đã xóa thành công!');
    }
}
