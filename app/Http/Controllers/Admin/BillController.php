<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bills;
use App\Models\BillDetails;
use App\Models\Users;
class BillController extends Controller
{
    public function getListBill()
    {
        $data['bills'] = Bills::paginate(10);
        return view('backend.page.bill.list-bill', $data);
    }
    public function getDetailBill(Request $request)
    {
        $data['bills'] = Bills::find($request->id);
        $data['billDetails'] = BillDetails::where('bills_id', $request->id)->first()->get();
        return view('backend.page.bill.detail-bill', $data);
    }
    public function updateBill(Request $request)
    {
        $table= Bills::find($request->id);
        $table->status=$request->status;
        $table->save();
        return redirect(route('listBill'))->with('notification','Thay đổi trạng thái đơn hàng thành công');
    }
}
