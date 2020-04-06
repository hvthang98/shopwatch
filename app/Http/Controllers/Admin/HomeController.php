<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    function adminlogin(){
    	return view('backend.page.admin-login');
    }
    function postadminlogin(Request $request)
    {
    	$request->validate([
    		'Email'=>'required|email',
    		'Password'=>'required|min:6'
    	]
    	,
    	[
    		'Email.required'=>'Email không được để trống',
    		'Email.email'=>'Không đúng định dạng email',
    		'Password.required'=>'Password không được để trống',
    		'Password.min'=>'Mật khẩu không được nhỏ hơn 6 ký tự'
    	]);
    	$mail=$request->Email;
    	$password=$request->Password;
    	$result=['email'=>$mail,'password'=>$password,'level'=>'1'];
    	if(Auth::attempt($result)){
    		
    		return redirect('admin/dashboard');
    	}
    	else{
    		return view('backend.page.admin-login',['tb'=>'Sai thông tin đăng nhập']);
    	}
    }
    function index()
    {
    	return view('backend.page.dashboard');
    }//abcd
    function logout(){
    	if(Auth::check()){
    	Auth::logout();
    	return redirect('admin-login');
    	}
    }
}
