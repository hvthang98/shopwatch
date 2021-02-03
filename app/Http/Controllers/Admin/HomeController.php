<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class HomeController extends Controller
{
	public function login()
	{
		if(Auth::check()){
			return redirect()->route('admin.dashboard.index');
		}
		return view('backend.page.admin-login');
	}

	public function isLogin(LoginRequest $request)
	{
		$mail = $request->Email;
		$password = $request->Password;
		$result = ['email' => $mail, 'password' => $password, 'roles_id' => 1];
		if (Auth::attempt($result)) {
			return redirect('admin/dashboard');
		} else {
			return view('backend.page.admin-login', ['tb' => 'Sai thông tin đăng nhập']);
		}
	}

	public function logout()
	{
		if (Auth::check() && Auth::user()->roles_id != 0) {
			Auth::logout();
			return redirect('admin-login');
		}
	}
}
