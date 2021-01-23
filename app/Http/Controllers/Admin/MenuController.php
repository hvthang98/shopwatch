<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Brands;
use App\Models\Categories;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands= Brands::all();
        $categories = Categories::all();
        $menus = Menu::orderBy('ordernum', 'asc')->paginate(15);
        return view('backend.page.menu.ListMenu', compact('menus','brands','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::all();
        return view('backend.page.menu.AddMenu', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $menu = Menu::create($req->all());
        $ordernum = $req->ordernum;
        $list = Menu::where('ordernum', '>', $ordernum)->get();
        foreach ($list as $item) {
            $num = $item->ordernum;
            $num++;
            $item->ordernum = $num;
            $item->save();
        }
        $menu->ordernum = $ordernum + 1;
        $menu->save();
        return redirect()->route('admin.menu.index')->with('notification', 'Đã thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menus = Menu::all();
        $menu = Menu::find($id);
        return view('backend.page.menu.EditMenu', compact('menus', 'menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $menu = Menu::find($id);
        $menu->name = $request->name;
        $menu->status = $request->status;
        $ordernum = $request->ordernum;
        if ($ordernum != $menu->ordernum) {
            $list = Menu::where('ordernum', '>', $ordernum)->get();
            foreach ($list as $item) {
                $num = $item->ordernum;
                $num++;
                $item->ordernum = $num;
                $item->save();
            }
            $menu->ordernum = $ordernum + 1;
        }
        $menu->save();
        return redirect()->route('admin.menu.index')->with('notification', 'Đã cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Menu::destroy($id);
        return redirect()->back()->with('notification', 'Đã xóa thành công');
    }

    public function active(Request $req)
    {
        try {
            $menu = Menu::find($req->id);
            $menu->status = 1;
            $menu->save();
            return response()->json([
                'status' => true,
                'code' => 200,
                'message' => 'Đã thay đổi thành công',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'code' => 500,
                'message' => $th->getMessage(),
            ]);
        }
    }

    public function unactive(Request $req)
    {
        try {
            $menu = Menu::find($req->id);
            $menu->status = 0;
            $menu->save();
            return response()->json([
                'status' => true,
                'code' => 200,
                'message' => 'Đã thay đổi thành công',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'code' => 500,
                'message' => $th->getMessage(),
            ]);
        }
    }
}
