<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserLoginRequest;
use App\Models\Banners;
use App\Models\Products;
use App\Models\Brands;
use App\Models\ImgProduct;
use App\User;
use Captcha;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('fontend.page.login');
    }

    public function checkLogin(Request $request)
    {
        $request->validate(['email' => 'required', 'password' => 'required|min:6'], ['required' => 'Không được để trống trường', 'min' => 'Mật khẩu ít nhất 6 ký tự']);
        $email = $request->email;
        $pass = $request->password;
        if (Auth::attempt(['email' => $email, 'password' => $pass])) {

            return redirect('/')->with('notification', 'Đăng nhập thành công');
        } else {
            return redirect()->back()->with('notification', 'Thông tin đăng nhập sai');
        }
    }

    public function show($id)
    {
        $infor = User::where('id', $id)->get();

        return view('fontend.page.user-infor')->with('infors', $infor);
    }
    public function update(Request $request, $id)
    {
        $infor = User::find($id);
        $infor->name = $request->name;
        $infor->email = $request->email;
        $infor->phone_number = $request->phonenumber;
        $infor->birthday = $request->birthday;
        $infor->address = $request->address;
        if ($request->repas != null) {
            $infor->password = bcrypt($request->repas);
        }
        $infor->save();
        return redirect('/')->with('notification', 'Cập nhật thông tin thành công');
    }
    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
            return redirect('/');
        }
    }
    public function create()
    {
        if(Auth::check()){
            return redirect('/');
        }
        return view('fontend.page.sign-up');
    }

    public function store(UserLoginRequest $request)
    {
        $data = $request->all();
        $user = new User;
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->name = $data['name'];
        $user->birthday = $data['birthday'];
        $user->phone_number = $data['phonenumber'];
        $user->address = $data['address'];
        $user->save();
        return redirect('/')->with('notification', 'Đăng ký tài khoản thành công');
    }
}
