<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
class NewsController extends Controller
{
    public function add_new(){
    	return view('backend.page.new.add-new');

    }
    public function post_add_new(Request $request){
    	$request->validate(['title'=>'required','content'=>'required','image'=>'required']);
    	$title=$request->title;
    	$content=$request->content;
    	$status=$request->status;
    	$image=$request->image;
    	$file_name=$image->getClientOriginalName();
    	$image->move('public/upload/images/', $file_name);
    	$new=new News;
    	$new->title=$title;
    	$new->content=$content;
    	$new->status=$status;
    	$new->image=$file_name;
    	$new->save();
    	return redirect('admin/new/all-new')->with('notification','Đã thêm tin mới');

    }
    public function all_new(){
    	$news=News::paginate(5);
    	return view('backend.page.new.list-new')->with('news',$news);
    }
    public function active($id){
    	$new=News::find($id);
    	$new->status=1;
    	$new->save();
    	return redirect()->back();

    }
    public function unactive($id){
    	$new=News::find($id);
    	$new->status=0;
    	$new->save();
    	return redirect()->back();

    }
    public function edit($id){
    	$new=News::where('id',$id)->get();
    	return view('backend.page.new.edit-new')->with('new',$new);
    }
    public function post_edit(Request $request,$id){
    	$title=$request->title;
    	$content=$request->content;
    	$status=$request->status;
    	$new=News::find($id);
    	$new->title=$title;
    	$new->content=$content;
    	$new->status=$status;
    	$new->save();
    	return redirect('admin/new/all-new')->with('notification','Đã cập nhật thành công');
    }
    public function delete($id){
    	News::find($id)->delete();
    	return redirect()->back()->with('notification','Đã xóa thành công');
    }
}
