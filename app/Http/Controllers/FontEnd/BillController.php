<?php

namespace App\Http\Controllers\FontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Carts;
use App\Models\OrderDetails;
use App\Models\Products;

class BillController extends Controller
{
    public function store(Request $request)
    {
        $table = new Bills;
        $table->total = $request->total;
        $table->note = $request->note;
        $table->name = $request->name;
        $table->address = $request->address;
        $table->phone_number = $request->phone_number;
        $table->users_id = $request->users_id;
        $table->save();
        if (Auth::check()) {
            $carts = Carts::where('users_id', Auth::user()->id)->get();
            foreach ($carts as $cart) {
                $detail = new BillDetails;
                $detail->bills_id = $table->id;
                $detail->products_id = $cart->products_id;
                $detail->quantily = $cart->quantily;
                $detail->price = $cart->products->sellprice;
                $detail->save();

                //update quantily product
                $product = Products::find($cart->products_id);
                $quantily = ($product->quantily) - ($cart->quantily);
                $product->quantily = $quantily;
                $product->save();
            }
            Carts::where('users_id', Auth::user()->id)->delete();
        } else {
            foreach (session('cart') as $value) {
                //create detail bill
                $product = Products::find($value['products_id']);
                $detail = new BillDetails;
                $detail->bills_id = $table->id;
                $detail->products_id = $value['products_id'];
                $detail->quantily = $value['quantily'];
                $detail->price = $product->sellprice;
                $detail->save();

                //update quantily product
                $quantily = ($product->quantily) - $value['quantily'];
                $product->quantily = $quantily;
                $product->save();
            }
        }
        //delete all session
        session()->forget('cart');
        return redirect(route('fontend.cart.index'))->with('notification', 'Đặt đơn hàng thành công');
    }
    public function show(Request $request)
    {
        $bill = Order::find($request->id);
        if(!isset($bill)){
            return redirect()->route('fontend.index');
        }
        $billDetail = BillDetails::where('bills_id', $request->id)->get();
        return view('fontend.page.bill', compact('billDetail', 'bill'));
    }
}
