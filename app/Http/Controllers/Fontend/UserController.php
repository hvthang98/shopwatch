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
    //

    public function user_login()
    {
    	return view('fontend.page.login');
    }

    public function post_user_login(Request $request)
    {
    	$request->validate(['email'=>'required','password'=>'required|min:6','captcha' => 'required|captcha'],['required'=>'Không được để trống trường','min'=>'Mật khẩu ít nhất 6 ký tự']);

    	$email=$request->email;
    	$pass=$request->password;
    	if(Auth::attempt(['email'=>$email,'password'=>$pass,'level'=>0]))
    	{

    		return redirect('/')->with('notification','Đăng nhập thành công');
    	}
        else{
            return redirect()->back()->with('notification','Thông tin đăng nhập sai');
        }

    }

    function user_infor($id){
        $infor=User::where('id',$id)->get();

        return view('fontend.page.user-infor')->with('infors',$infor);
    }
    function post_user_infor(Request $request,$id){
       
        $infor= User::find($id);
        $infor->name=$request->name;
        $infor->email=$request->email;
        $infor->phone_number=$request->phonenumber;
        $infor->birthday=$request->birthday;
        $infor->address=$request->address;
        if($request->repas != null){
            $infor->password=bcrypt($request->repas);
        }
        
        $infor->save();
        return redirect('/')->with('notification','Cập nhật thông tin thành công');
    }
    public function user_logout()
    {
    	if(Auth::check() ){
    		Auth::logout();
    		return redirect('/');
    	}
    }


    public function user_signup()
    {
    	return view('fontend.page.sign-up');
    }

    public function post_user_signup(UserLoginRequest $request )
    { 

    	 $data=$request->all();
    	 $user=new User;
    	 $user->email=$data['email'];
    	 $user->password=bcrypt($data['password']);
    	 $user->name=$data['name'];
    	 $user->birthday=$data['birthday'];
    	 $user->phone_number=$data['phonenumber'];
    	 $user->address=$data['address'];
    	 $user->save();
    	return redirect('/')->with('notification','Đăng ký tài khoản thành công');
    }
}
