<?php

namespace App\Http\Controllers\FontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index(){
    	$news=News::where('status',1)->paginate(6);
    	return view('fontend.page.all-new')->with('news',$news);
    }
    public function show($id){
    	$detailnew=News::where('id',$id)->get();
    	return view('fontend.page.detail-new')->with('detailnew',$detailnew);
    }
}
