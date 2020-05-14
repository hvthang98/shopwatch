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
    //
	//  public function index(){
    	
    	
    // 	$highlight_product=Products::where('status',1)->where('ordernum',1)->limit(9)->get();
    	
    // 	$new_product=Products::where('status',1)->where('ordernum',2)->limit(9)->get();

	public function index()
	{
		$highlight_product = Products::where('status', 1)->where('ordernum', 1)->limit(12)->get();
		// dd($highlight_product);
		$new_product = Products::where('status', 1)->where('ordernum', 2)->limit(12)->get();
		$new=News::all()->random(6);

		$highlight_img = []; //mảng danh sách hình ảnh sp nổi bật
		foreach ($highlight_product as  $h) {
			$imgproduct1 = Products::find($h->id)->imageProduct()->where('level', 1)->get();
			foreach ($imgproduct1 as  $img1) {
				$highlight_img[] = $img1->image;
			}
		}
		for ($i = 0; $i < count($highlight_product); $i++) {
			$highlight_product[$i]['img'] = $highlight_img[$i];
		}
		$new_img = []; //mảng danh sách hình ảnh sp mới
		foreach ($new_product as  $n) {

			$imgproduct2 = Products::find($n->id)->imageProduct()->where('level', 1)->get();
			foreach ($imgproduct2 as  $img2) {
				$new_img[] = $img2->image;
			}
		}
		for ($i = 0; $i < count($new_img); $i++) {
			$new_product[$i]['img'] = $new_img[$i];
		}
		
		return view('fontend.page.home')->with('highlight_product', $highlight_product)->with('new_product', $new_product)->with('new',$new);
	}
}
