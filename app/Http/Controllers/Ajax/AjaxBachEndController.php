<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\BrandCategories;
use Illuminate\Http\Request;

class AjaxBachEndController extends Controller
{
    public function getBrand(Request $req)
    {
        $category = BrandCategories::where('categories_id', $req->id)->get();
        $data['categories'] =$category;
        return view('backend.ajax.brand',$data);
    }
}
