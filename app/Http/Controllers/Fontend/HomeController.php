<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\Products;
use App\Models\ImgProduct;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

	public function index()
	{
		$highlight_product = Products::where('status', 1)->where('ordernum', 1)->get();

		$new_product = Products::where('status', 1)->where('ordernum', 2)->get();

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
		$i = 1;
		$j = 1;
		return view('fontend.page.home')->with('highlight_product', $highlight_product)->with('new_product', $new_product)->with('i', $i)->with('j', $j);
	}
}
