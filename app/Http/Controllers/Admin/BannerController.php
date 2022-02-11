<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Http\Requests\BannerRequest;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::orderBy('sort', 'asc')->get();
        return view('backend.banners.index', compact('banners'));
    }

    public function create()
    {
        $banners = Banner::orderBy('sort', 'asc')->get();
        return view('backend.banners.create', compact('banners'));
    }

    public function store(BannerRequest $request)
    {
        $banner = new Banner();
        $banner->title = $request->banner_name;
        if (isset($request->banner_link)) {
            $banner->link = $request->banner_link;
        }
        $banner->status = $request->banner_status;
        //sort
        // $sort = $request->sort;
        // $list = Banner::where('sort', '>', $sort)->get();
        // foreach ($list as $item) {
        //     $num = $item->sort;
        //     $num++;
        //     $item->sort = $num;
        //     $item->save();
        // }
        $banner->sort = 1;
        //upload file avatar of banner
        $path = $request->file('banner_image')->store('banner');
        $banner->image = $path;
        $banner->save();
        return redirect()->route('admin.banner.index')->with('notification', 'Đã thêm mới thành công!');
    }

    public function edit($id)
    {
        $banner = Banner::find($id);
        $banners = Banner::orderBy('sort', 'asc')->get();
        return view('backend.banners.edit', compact('banners', 'banner'));
    }

    public function update(Request $request, $id)
    {
        $banner = Banner::find($id);
        $banner->name = $request->edit_banner_name;
        $banner->link = $request->edit_banner_link;
        $banner->status = $request->edit_banner_status;
        //sort
        $sort = $request->sort;
        $list = Banner::where('sort', '>', $sort)->get();
        foreach ($list as $item) {
            $num = $item->sort;
            $num++;
            $item->sort = $num;
            $item->save();
        }
        $banner->sort = $sort + 1;
        //upload avatar banner
        $file_image = $request->edit_banner_img;
        if ($file_image) {
            Storage::delete($banner->image);
            $path = $request->file('edit_banner_img')->store('banner');
            $banner->image = $path;
        }
        $banner->save();
        return redirect()->route('admin.banner.index')->with('notification', 'Đã cập nhật thành công!');
    }

    public function destroy($id)
    {
        $banner = Banner::find($id);
        Storage::delete($banner->image);
        $banner->delete();
        return redirect()->route('admin.banner.index')->with('notification', 'Đã xóa thành công!');
    }

    public function active($id)
    {
        try {
            $banner = Banner::find($id);
            $banner->status = 1;
            $banner->save();
            return response()->json([
                'status' => true,
                'code' => 200,
                'message' => 'Đã thay đổi trạng thái thành công',
            ])->setStatusCode(200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'code' => 500,
                'message' => $th,
            ]);
        }
    }

    public function unactive($id)
    {
        try {
            $banner = Banner::find($id);
            $banner->status = 0;
            $banner->save();
            return response()->json([
                'status' => true,
                'code' => 200,
                'message' => 'Đã thay đổi trạng thái thành công',
            ])->setStatusCode(200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'code' => 500,
                'message' => $th,
            ]);
        }
    }
}
