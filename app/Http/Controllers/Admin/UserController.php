<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserChangePW;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
	public function create()
	{
		return view('backend.page.user.add-user');
	}
	public function store(UserRequest $request)
	{
		$email = $request->email;
		$pass = bcrypt($request->pass);
		$name = $request->name;
		$birthday = $request->birthday;
		$phonenumber = $request->phonenumber;
		$address = $request->address;
		$level = $request->level;

		$user = new User;
		$user->email = $email;
		$user->password = $pass;
		$user->name = $name;
		$user->birthday = $birthday;
		$user->phone_number = $phonenumber;
		$user->address = $address;
		$user->level = $level;
		$user->save();
		return redirect()->route('admin.user.index')->with(['notification' => 'Đã thêm mới thành công']);
	}
	public function index()
	{
		$users = User::paginate(5);
		return view('backend.page.user.all-user', ['users' => $users]);
	}
	public function edit($id)
	{
		$user = User::where('id', $id)->get();

		return view('backend.page.user.edit-user', ['user' => $user]);
	}
	public function update(UserRequest $request, $id)
	{
		$data = $request->all();
		$user = User::find($id);
		$user->email = $data['email'];
		$user->name = $data['name'];
		$user->birthday = $data['birthday'];
		$user->phone_number = $data['phonenumber'];
		$user->address = $data['address'];
		$user->level = $data['level'];
		$user->save();
		return redirect()->route('admin.user.index')->with(['notification' => 'Đã cập nhật người dùng thành công']);
	}
	public function active($id)
	{
		$user = User::find($id);
		$user->level = 1;
		$user->save();
		return redirect()->back();
	}
	public function unactive($id)
	{
		$user = User::find($id);
		$user->level = 0;
		$user->save();
		return redirect()->back();
	}
	public function destroy($id)
	{
		User::find($id)->delete();
		return redirect()->route('admin.user.index')->with(['notification' => 'Đã xóa thành công']);
	}
	public function show(Request $request)
	{
		$data['user'] = User::find($request->id);
		return view('backend.page.user.infor-user', $data);
	}
	public function changePassword(Request $request)
	{
		return view('backend.page.user.change-pw-user');
	}
	public function updatePassword(UserChangePW $request)
	{
		$user = User::find(Auth::user()->id);
		$user->password = bcrypt($request->password);
		$user->save();
		return redirect()->route('admin.dashboard.index')->with('notification', 'Đã thay đổi mật khẩu thành công');
	}
}
