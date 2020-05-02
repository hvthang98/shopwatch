<?php

namespace App\Http\Controllers\FontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bills;
use App\Models\BillDetails;
use App\Models\Products;

class BillFontEndController extends Controller
{
    public function create(Request $request)
    {
        // echo $request->name."<br>";
        // echo $request->address."<br>";
        // echo $request->phone_number."<br>";
        // echo $request->note."<br>";
        // echo $request->total."<br>";

        $table = new Bills;
        $table->total = $request->total;
        $table->note = $request->note;
        $table->name = $request->name;
        $table->address = $request->address;
        $table->phone_number = $request->phone_number;
        $table->save();

        foreach (session('cart') as $value) {
            $product=Products::find($value['products_id']);
            $detail = new BillDetails;
            $detail->bills_id = $table->id;
            $detail->products_id = $value['products_id'];
            $detail->quantily = $value['quantily'];
            $detail->price=$product->sellprice;
            if($detail->save()){
                session()->forget('cart');
                return redirect(route('getCart'))->with('notification','Tạo đơn hàng thành công');
            }
        }
    }
}
