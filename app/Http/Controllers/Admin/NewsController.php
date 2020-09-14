<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
	public function add_new()
	{
		return view('backend.page.new.add-new');
	}
	public function store(Request $request)
	{
		$request->validate(['title' => 'required', 'content' => 'required', 'image' => 'required']);
		$path = $request->file('image')->store('news');
		$new = new News;
		$new->title = $request->title;
		$new->content = $request->content;
		$new->status = $request->status;
		$new->image = $path;
		$new->save();
		return redirect()->route('list-news')->with('notification', 'Đã thêm tin mới');
	}
	public function all_new()
	{
		$news = News::orderBy('created_at', 'desc')->paginate(5);
		return view('backend.page.new.list-new')->with('news', $news);
	}
	public function active($id)
	{
		$new = News::find($id);
		$new->status = 1;
		$new->save();
		return redirect()->back();
	}
	public function unactive($id)
	{
		$new = News::find($id);
		$new->status = 0;
		$new->save();
		return redirect()->back();
	}
	public function edit($id)
	{
		$news = News::find($id);
		return view('backend.page.new.edit-new')->with('news', $news);
	}
	public function update(Request $request, $id)
	{
		$news = News::find($id);
		if(isset($request->image)){
			Storage::delete($news->image);
			$path=$request->file('image')->store('news');
			$news->image=$path;
		}
		$news->title = $request->title;
		$news->content = $request->content;
		$news->status = $request->status;
		$news->save();
		return redirect()->route('list-news')->with('notification', 'Đã cập nhật thành công');
	}
	public function delete($id)
	{
		$news = News::find($id);
		Storage::delete($news->image);
		$news->delete();
		return redirect()->back()->with('notification', 'Đã xóa thành công');
	}
}
