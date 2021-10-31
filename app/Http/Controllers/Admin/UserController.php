<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserChangePW;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;
use App\Repositories\User\UserRepository;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
	protected $model;
	public function __construct(UserRepository $user)
	{
		$this->model = $user;
	}

	public function create()
	{
		$roles = Role::all();
		return view('backend.page.user.add-user', compact('roles'));
	}

	public function store(UserRequest $request)
	{
		$this->model->store($request->all());
		return redirect()->route('admin.user.index')->with(['notification' => 'Đã thêm mới thành công']);
	}

	public function index()
	{
		$users = User::paginate(5);
		return view('backend.page.user.index', ['users' => $users]);
	}

	public function edit($id)
	{
		$user = User::where('id', $id)->get();

		return view('backend.page.user.edit-user', ['user' => $user]);
	}

	public function update(UpdateUserRequest $request, $id)
	{
		$this->model->update($request->all(), $id);
		return redirect()->route('admin.user.index')->with(['notification' => 'Đã cập nhật người dùng thành công']);
	}

	public function destroy($id)
	{
		$this->model->destroy($id);
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
		$this->model->changePassword($request->password, Auth()->user()->id);
		return redirect()->route('admin.dashboard.index')->with('notification', 'Đã thay đổi mật khẩu thành công');
	}
}
