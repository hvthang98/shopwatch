<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Brands;

class ProductController extends Controller
{
    public function index()
    {
        $data['brands'] = Brands::all();
        return view('backend.page.add-product', $data);
    }
    public function getProduct(){
        echo 'ok';
    }
}
