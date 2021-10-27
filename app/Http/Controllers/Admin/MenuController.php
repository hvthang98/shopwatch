<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Menu\MenuRepository;
use App\Models\Menu;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    protected $model;

    public function __construct(MenuRepository $menu)
    {
        $this->model = $menu;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = $this->model->get(15);
        return view('backend.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = $this->model->all();
        return view('backend.menus.create', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:menus,name',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $data['menu_parent'] = $request->parent;

        $this->model->store($data);
        return redirect()->route('admin.menu.index')->with('notification', 'Đã thêm thành công');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menus = Menu::where('id', '!=' ,$id)->get();
        $menu = $this->model->show($id);
        return view('backend.menus.edit', compact('menus', 'menu'));
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
        $request->validate([
            'name' => 'required|unique:menus,name,'.$id,
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $data['menu_parent'] = $request->parent;

        $this->model->update($data, $id);
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
        $this->model->delete($id);
        return redirect()->back()->with('notification', 'Đã xóa thành công');
    }
    
}
