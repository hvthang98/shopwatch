<?php

namespace App\Http\Controllers\Admin;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
class HomeController extends Controller
{
	function adminlogin()
	{
		return view('backend.page.admin-login');
	}
	function postadminlogin(LoginRequest $request)
	{
		
		$mail = $request->Email;
		$password = $request->Password;
		$result = ['email' => $mail, 'password' => $password, 'level' => '1'];
		if (Auth::attempt($result)) {
			
			return redirect('admin/dashboard');
		} else {
			return view('backend.page.admin-login', ['tb' => 'Sai thông tin đăng nhập']);
		}
	}
	function index()
	{
		return view('backend.page.dashboard');
	}
	function logout()
	{
		if (Auth::check() && Auth::user()->level!= 0) {
			Auth::logout();
			return redirect('admin-login');
		}
	}
}
