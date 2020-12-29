<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
	public function index()
	{
		$news = News::orderBy('created_at', 'desc')->paginate(5);
		return view('backend.page.news.list-new')->with('news', $news);
	}

	public function create()
	{
		return view('backend.page.news.add-new');
	}

	public function store(Request $request)
	{
		$request->validate(['title' => 'required', 'content' => 'required', 'image' => 'required']);
		$path = $request->file('image')->storeAs('news',date('Y_m_d').'_'.$request->title);
		$new = new News;
		$new->title = $request->title;
		$new->content = $request->content;
		$new->status = $request->status;
		$new->image = $path;
		$new->save();
		return redirect()->route('admin.news.index')->with('notification', 'Đã thêm tin mới');
	}
	
	public function edit($id)
	{
		$news = News::find($id);
		return view('backend.page.news.edit-new')->with('news', $news);
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
		return redirect()->route('admin.news.index')->with('notification', 'Đã cập nhật thành công');
	}

	public function destroy($id)
	{
		$news = News::find($id);
		Storage::delete($news->image);
		$news->delete();
		return redirect()->back()->with('notification', 'Đã xóa thành công');
	}

	public function active($id)
	{
		try {
			$new = News::find($id);
			$new->status = 1;
			$new->save();
			return response()->json([
                'status' => true,
                'code'=>200,
                'message'=>'Đã thay đổi trạng thái thành công',
            ])->setStatusCode(200);
		} catch (\Throwable $th) {
			return response()->json([
                'status' => false,
                'code'=>500,
                'message'=> $th,
            ]);
		}
		
	}

	public function unactive($id)
	{
		try{
			$new = News::find($id);
			$new->status = 0;
			$new->save();
			return response()->json([
				'status' => true,
				'code'=>200,
				'message'=>'Đã thay đổi trạng thái thành công',
			])->setStatusCode(200);
		}catch(\Throwable $th){
			return response()->json([
                'status' => false,
                'code'=>500,
                'message'=> $th,
            ]);
		}
	}
}
