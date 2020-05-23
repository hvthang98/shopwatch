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
        $table = new Bills;
        $table->total = $request->total;
        $table->note = $request->note;
        $table->name = $request->name;
        $table->address = $request->address;
        $table->phone_number = $request->phone_number;
        $table->users_id = $request->users_id;
        $table->save();

        foreach (session('cart') as $value) {
            $product = Products::find($value['products_id']);
            $detail = new BillDetails;
            $detail->bills_id = $table->id;
            $detail->products_id = $value['products_id'];
            $detail->quantily = $value['quantily'];
            $detail->price = $product->sellprice;
            $detail->save();
        }
        session()->forget('cart');
        return redirect(route('getCart'))->with('notification', 'Đặt đơn hàng thành công');
    }
    public function getBillUser(Request $request)
    {
        $data['bill'] = Bills::find($request->id);
        $data['billDetail'] = BillDetails::where('bills_id', $request->id)->get();
        return view('fontend.page.bill', $data);
    }
}
