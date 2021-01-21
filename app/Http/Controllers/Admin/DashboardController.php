<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\Bills;
use App\Models\BillDetails;
class DashboardController extends Controller
{
    function index()
	{
		$users=count(User::where('roles_id',1)->get());
        $order=count(Bills::all());
        // $date=date('m');
        // $products=BillDetails::where('created_at','>','2020-5-1')->get()->toarray();
        // dd($products);
		return view('backend.page.dashboard',compact('users','order'));
	}
}
