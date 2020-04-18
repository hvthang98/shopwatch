<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
class CategoryController extends Controller
{
    function add_category(){
    	return view('backend.page.category.add-category');
    }

    function post_add_category(Request $request){
    	$request->validate(['category_name'=>'required']);
    	$category_name=$request->category_name;
    	$status=$request->status;
    	$category=new Categories();
    	$category->name=$category_name;
    	$category->status=$status;
    	$category->save();
    	return redirect('admin/category/all-category/')->with(['notification'=>'Đã thêm danh mục thành công']);

    }

    function all_category(){
    	$categories=Categories::all();
    	return view('backend.page.category.all-category',['categories'=>$categories]);
    }
    function edit_category($id){
    	$category=Categories::where('id',$id)->get();
    	
    	return view('backend.page.category.edit-category',['category'=>$category]);
    }
    function post_edit_category(Request $request, $id){
    	$name=$request->edit_category_name;
    	$status=$request->edit_status;
    	$category=Categories::find($id);

    	$category->name=$name;
    	$category->status=$status;
    	$category->save();
    	return redirect('admin/category/all-category')->with(['notification'=>'Đã cập nhật danh mục thành công']);
    	
    	
    }

    function delete_category($id){
    	Categories::find($id)->delete();
    	return redirect('admin/category/all-category/')->with(['notification'=>'Đã xóa danh mục thành công']);
    }

    function active_category($id){
    	$category=Categories::find($id);
    	$category->status=1;
    	$category->save();
    	return redirect()->back();

    }

    function unactive_category($id){
    	$category=Categories::find($id);
    	$category->status=0;
    	$category->save();
    	return redirect()->back();

    }
}
