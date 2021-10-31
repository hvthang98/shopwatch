<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Products;

class BillController extends Controller
{
    public function index()
    {
        $data['bills'] = Order::orderBy('status')->orderBy('created_at')->paginate(10);
        return view('backend.page.bill.list-bill', $data);
    }
    public function show(Request $request)
    {
        $data['bills'] = Order::find($request->id);
        $data['billDetails'] = BillDetails::where('bills_id', $request->id)->get();
        return view('backend.page.bill.detail-bill', $data);
    }
    public function update(Request $request)
    {
        $table = Order::find($request->id);
        $table->status = $request->status;
        $table->save();
        return redirect(route('admin.bill.index'))->with('notification', 'Thay đổi trạng thái đơn hàng thành công');
    }
    public function destroy(Request $request)
    {
        // quantily product rollback 
        $bill = Order::find($request->id);
        $detail_bill = BillDetails::where('bills_id', $request->id)->get();
        if ($bill->status != 3) {
            foreach ($detail_bill as $detail) {
                $product = Products::find($detail->products_id);
                $product->quantily = ($product->quantily) + ($detail->quantily);
                $product->save();
            }
        }
        //delete bill
        $bill = Order::find($request->id)->delete();
        return redirect(route('admin.bill.index'))->with('notification', 'Đã xóa đơn hàng đơn hàng thành công');
    }
}
