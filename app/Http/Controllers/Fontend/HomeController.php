<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\Products;
use App\Models\News;
use App\Models\ImgProduct;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
	public function index()
	{
		$highlight_product = Products::where('status', 1)->orderBy('views','desc')->limit(8)->orderBy('created_at','desc')->get();
		$new_product = Products::where('status', 1)->orderBy('created_at','desc')->limit(8)->get();
		$new = News::where('status', 1)->orderBy('created_at', 'desc')->limit(6)->get();
		return view('fontend.page.home')->with('highlight_product', $highlight_product)->with('new_product', $new_product)->with('new', $new);
	}
}
