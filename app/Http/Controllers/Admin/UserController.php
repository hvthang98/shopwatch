<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    function add_user(){
    	return view('backend.page.user.add-user');
    }
    function post_add_user(UserRequest $request){

    	$email=$request->email;
    	$pass=bcrypt($request->pass);
    	$name=$request->name;
    	$birthday=$request->birthday;
    	$phonenumber=$request->phonenumber;
    	$address=$request->address;
    	$level=$request->level;

    	$user=new User;
    	$user->email=$email;
    	$user->password=$pass;
    	$user->name=$name;
    	$user->birthday=$birthday;
    	$user->phone_number=$phonenumber;
    	$user->address=$address;
    	$user->level=$level;
    	$user->save();
    	return redirect('admin/user/all-user')->with(['notification'=>'Đã thêm mới thành công']);


    }
    function all_user(){
    	$users=User::paginate(5);
    	return view('backend.page.user.all-user',['users'=>$users]);
    }
    function edit_user($id){
    	$user=User::where('id',$id)->get();

    	return view('backend.page.user.edit-user',['user'=>$user]);
    }
    function post_edit_user(UserRequest $request, $id){
    	$data=$request->all();
    	$user=User::find($id);
    	$user->email=$data['email'];
    	//$user->password=bcrypt($data['pass']);
    	$user->name=$data['name'];
    	$user->birthday=$data['birthday'];
    	$user->phone_number=$data['phonenumber'];
    	$user->address=$data['address'];
    	$user->level=$data['level'];
    	$user->save();
    	return redirect('admin/user/all-user')->with(['notification'=>'Đã cập nhật người dùng thành công']);
    }
    function active_admin($id){
    	$user=User::find($id);
    	$user->level=1;
    	$user->save();
    	return redirect()->back();

    }
    function unactive_admin($id){
    	$user=User::find($id);
    	$user->level=0;
    	$user->save();
    	return redirect()->back();
    }
    function delete_user($id){
    	User::find($id)->delete();
    	return redirect('admin/user/all-user')->with(['notification'=>'Đã xóa thành công']);
	}
	public function getDetailUser(Request $request)
	{
		$data['user']=User::find($request->id);
		return view('backend.page.user.infor-user',$data);
	}
	public function getChangePassword(Request $request)
	{
		return view('backend.page.user.change-pw-user');
	}
	public function postChangePassword(Request $request)
	{
		
	}
}
