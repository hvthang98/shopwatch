<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
class NewController extends Controller
{
    public function all_new(){
    	$news=News::where('status',1)->paginate(6);
    	return view('fontend.page.all-new')->with('news',$news);
    }
    public function detail_new($id){
    	$detailnew=News::where('id',$id)->get();
    	return view('fontend.page.detail-new')->with('detailnew',$detailnew);
    }
}
