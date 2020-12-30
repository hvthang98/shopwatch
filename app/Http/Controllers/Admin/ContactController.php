<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
class ContactController extends Controller
{
    public function index()
    {
    	$contact= Contact::paginate(6);
    	return view('backend.page.contact.all-contact')->with('contact',$contact);
    }
    public function destroy($id){
    	$con=Contact::find($id)->delete();
    	return redirect()->back()->with('notification','Đã xóa thành công');
    }
    public function reply(){
    	
    }
}
