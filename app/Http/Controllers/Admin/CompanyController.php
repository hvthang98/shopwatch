<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InformationCompany;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = InformationCompany::get()->first();
        return view('backend.page.company.index',compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = InformationCompany::get()->first();
        if(!empty($company)){
            $company->update($request->all());
        }else{
            InformationCompany::create($request->all());
        }
        return back()->with('notification','Cập nhật thành công');
    }

}
