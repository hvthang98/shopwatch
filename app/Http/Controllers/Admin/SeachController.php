<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bills;
use App\Models\Products;

class SeachController extends Controller
{
    private $key;
    private function filterKeyToArray($key)
    {
        $valueFliter = str_replace([',', '.'], ' ', $key);
        $array = explode(' ', $valueFliter);
        $array = array_filter($array, function ($value) {
            return !is_null($value) && $value !== '';
        });
        return $array;
    }
    public function getBill(Request $request)
    {
        $data['bills'] = Bills::where('id', $request->key)->orWhere('name', 'like', '%' . $request->key . '%')->paginate(10);
        return view('backend.page.bill.list-bill', $data);
    }
    public function getProducts(Request $req)
    {
        $products = Products::query();
        if (!$req->key) {
            $products = $products->paginate(12);
        } else {
            $array = $this->filterKeyToArray($req->key);
            $products->orWhere('name', 'like', '%' . $req->key . '%')->orWhere('id', 'like', $req->key);
            foreach ($array as $item) {
                $products->orWhere('tags', 'like', '%' . $item . '%');
            }
            $products = $products->paginate(12);
        }
        return view('backend.page.product.list-product', compact('products'));
    }
}
