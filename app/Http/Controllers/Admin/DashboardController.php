<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;

class DashboardController extends Controller
{
    function index()
    {
        $users = count(User::where('role_id', 1)->get());
        $order = count(Order::all());

        return view('backend.page.dashboard', compact('users', 'order'));
    }
}
