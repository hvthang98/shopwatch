<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Order, Product, OrderDetail};

class OrderController extends Controller
{
    protected $limit = 15;

    public function index()
    {
        $orders = Order::orderBy('status')->orderBy('created_at')->paginate($this->limit);
        return view('backend.orders.index', compact('orders'));
    }

    public function show(Request $request)
    {
        $orders = Order::find($request->id);
        $OrderDetail = BillDetails::where('bills_id', $request->id)->get();
        return view('backend.page.bill.detail-bill', compact('orders', 'OrderDetail'));
    }

    public function update(Request $request)
    {
        $table = Order::find($request->id);
        $table->status = $request->status;
        $table->save();
        return redirect(route('admin.order.index'))->with('notification', 'Thay đổi trạng thái đơn hàng thành công');
    }

    public function destroy(Request $request)
    {
        // quantily product rollback 
        $order = Order::find($request->id);
        $detail_order = BillDetails::where('order_id', $request->id)->get();
        if ($order->status != 3) {
            foreach ($detail_order as $detail) {
                $product = Products::find($detail->products_id);
                $product->quantily = ($product->quantily) + ($detail->quantily);
                $product->save();
            }
        }
        //delete order
        $order = Order::find($request->id)->delete();
        return redirect(route('admin.bill.index'))->with('notification', 'Đã xóa đơn hàng đơn hàng thành công');
    }
}
