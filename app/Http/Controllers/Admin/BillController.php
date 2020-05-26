<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bills;
use App\Models\BillDetails;
use App\Models\Products;
use App\Models\Users;

class BillController extends Controller
{
    public function getListBill()
    {
        $data['bills'] = Bills::orderBy('status')->orderBy('created_at')->paginate(10);
        return view('backend.page.bill.list-bill', $data);
    }
    public function getDetailBill(Request $request)
    {
        // echo $request->id;
        $data['bills'] = Bills::find($request->id);
        $data['billDetails'] = BillDetails::where('bills_id', $request->id)->get();
        // dd($data);
        return view('backend.page.bill.detail-bill', $data);
    }
    public function updateBill(Request $request)
    {
        $table = Bills::find($request->id);
        $table->status = $request->status;
        $table->save();
        return redirect(route('listBill'))->with('notification', 'Thay đổi trạng thái đơn hàng thành công');
    }
    public function delete(Request $request)
    {
        // quantily product rollback 
        $bill = Bills::find($request->id);
        $detail_bill = BillDetails::where('bills_id', $request->id)->get();
        if ($bill->status != 3) {
            foreach ($detail_bill as $detail) {
                $product = Products::find($detail->products_id);
                $product->quantily = ($product->quantily) + ($detail->quantily);
                $product->save();
            }
        }
        //delete bill
        $bill = Bills::find($request->id)->delete();
        return redirect(route('listBill'))->with('notification', 'Đã xóa đơn hàng đơn hàng thành công');
    }
}
