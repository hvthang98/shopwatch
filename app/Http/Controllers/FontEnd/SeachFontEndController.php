<?php

namespace App\Http\Controllers\FontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Info_product;
use App\Models\Brands;

class SeachFontEndController extends Controller
{
    public $seach;
    public function getSeach(Request $request)
    {
        $this->seach = $request->seach;
        $products = Products::where('status', 1)->where(function ($query) {
            $key = explode(',', $this->seach);
            foreach ($key as $value) {
                $query->orWhere('tags', 'like', '%' . $value . '%');
            }
        })->orWhere('name','like', '%' . $this->seach . '%')->orWhere('infor','like', '%' . $this->seach . '%')->get();
        $data['product'] = $products;
        $data['key'] = $this->seach;
        $data['brands'] = Brands::all();
        return view('fontend.page.list-product-seach', $data);
    }
}
