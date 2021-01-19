<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\BrandCategories;
use Illuminate\Http\Request;

class AjaxBachEndController extends Controller
{
    public function getBrand(Request $req)
    {
        $brand=[];
        $categories = BrandCategories::where('categories_id', $req->id)->get();
        foreach ($categories as $category){
            array_push($brand,$category->brand);
        }
        return response()->json([
            'status' =>true,
            'code' =>200,
            'data' => $brand,
        ]); 
    }
}
