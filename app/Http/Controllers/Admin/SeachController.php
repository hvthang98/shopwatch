<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bills;
use App\Models\Products;

class SeachController extends Controller
{
    public function getBill(Request $request)
    {
        $data['bills'] = Bills::where('id', $request->key)->orWhere('name','like','%'.$request->key.'%')->paginate(10);
        return view('backend.page.bill.list-bill', $data);
    }
    public function getProducts(Request $request)
    {
        if (strpos($request->key, '#') !== false) {
            $key = substr($request->key, 1);
            $data['products'] = Products::where('id', $key)->paginate(10);
        } else {
            $data['products'] = Products::where('id', $request->key)->orWhere('name', 'like', '%' . $request->key . '%')->paginate(10);
        }
        return view('backend.page.list-product', $data);
    }
}
