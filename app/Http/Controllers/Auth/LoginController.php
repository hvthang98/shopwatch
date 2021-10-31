<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function showLoginForm()
	{
		if (Auth::check()) {
			return redirect()->route('admin.dashboard.index');
		}
		return view('backend.page.admin-login');
	}

	public function login(LoginRequest $request)
	{
		$mail = $request->Email;
		$password = $request->Password;
		$result = ['email' => $mail, 'password' => $password, 'role_id' => 1];
		if (Auth::attempt($result)) {
			return redirect('admin/dashboard');
		} else {
			return view('backend.page.admin-login', ['tb' => 'Sai thông tin đăng nhập']);
		}
	}

	public function logout()
	{
        Auth::logout();
        return redirect('admin');
	}
}
