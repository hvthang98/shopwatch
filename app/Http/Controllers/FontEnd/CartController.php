<?php

namespace App\Http\Controllers\FontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;
use App\Models\Carts;

class CartController extends Controller
{
    public function getCart()
    {
        $total = 0;
        if (Auth::check()) {
            //sign in user
            $data['carts_user'] = Carts::where('users_id', Auth::user()->id)->get();
            foreach ($data['carts_user'] as $cart) {
                $total += ($cart->quantily) * ($cart->products->sellprice);
            }
        } else {
            //not sign in 
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
        }
        $data['total'] = $total;
        $data['ship'] = 0;
        return view('fontend.page.cart', $data);
    }
    public function add(Request $request)
    {
        if (Auth::check()) {
            //sign in user
            $users_id = Auth::user()->id;
            $list_cart = Carts::where('users_id', $users_id)->where('products_id', $request->products_id)->get();
            if (count($list_cart) != 0) {
                $list_cart = $list_cart->first();
                $list_cart->quantily = ($list_cart->quantily) + ($request->quantily);
                $list_cart->save();
            } else {
                $cart = new Carts;
                $cart->products_id = $request->products_id;
                $cart->quantily = $request->quantily;
                $cart->users_id = Auth::user()->id;
                $cart->save();
            }
        } else {
            // not sign in user
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
        }
        return redirect(route('getCart'))->with('notification', 'Thêm sản phẩm vào giỏ hàng thành công');
    }
    public function updateCart(Request $request)
    {
        if (Auth::check()) {
            $cart = Carts::find($request->id);
            $cart->quantily = $request->quantily;
            $cart->save();
        } else {
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
        }
        return redirect(route('getCart'));
    }
    public function delete(Request $request)
    {
        if (Auth::check()) {
            Carts::find($request->products_id)->delete();
        } else {
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
        }
        return redirect(route('getCart'));
    }
}
