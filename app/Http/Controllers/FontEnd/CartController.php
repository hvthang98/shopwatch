<?php

namespace App\Http\Controllers\FontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;

class CartController extends Controller
{
    public function getCart()
    {
        $total = 0;
        if (session()->has('cart')) {
            $carts = session('cart');
            foreach ($carts as $key => $value) {
                $product = Products::find($value['products_id']);
                $carts[$key]['product'] = $product;
                $total += $product->sellprice * $value['quantily'];
            }
            $data['carts'] = $carts;
        }
        //dd($carts);
        $data['total'] = $total;
        $data['ship'] = 0;
        return view('fontend.page.cart', $data);
    }
    public function add(Request $request)
    {
        $data = [];
        $count = 0;
        if (session()->has('cart')) {
            $data = session('cart');
            foreach ($data as $key => $value) {
                if ($value['products_id'] == $request->products_id) {
                    $quantily = $value['quantily'] + $request->quantily;
                    $data[$key] = [
                        'products_id' => $request->products_id,
                        'quantily' => $quantily
                    ];
                    $count = 1;
                    break;
                }
            }
        }
        if ($count == 0) {
            array_push($data, [
                'products_id' => $request->products_id,
                'quantily' => $request->quantily
            ]);
        }
        session()->put('cart', $data);
        return redirect(route('getCart'));
    }
    public function updateCart(Request $request)
    {
        $data = [];
        if (session()->has('cart')) {
            $data = session('cart');
            foreach ($data as $key => $value) {
                if ($value['products_id'] == $request->products_id) {
                    $data[$key] = [
                        'products_id' => $request->products_id,
                        'quantily' => $request->quantily
                    ];
                    break;
                }
            }
            session()->put('cart', $data);
        }
        return redirect(route('getCart'));
    }
    public function delete(Request $request)
    {
        if (session()->has('cart')) {
            $data = session('cart');
            foreach ($data as $key => $value) {
                if ($value['products_id'] == $request->products_id) {
                    unset($data[$key]);
                    break;
                }
            }
            if ($data == null) {
                session()->forget('cart');
            } else {
                session()->put('cart', $data);
            }
        }
        return redirect(route('getCart'));
    }
}
