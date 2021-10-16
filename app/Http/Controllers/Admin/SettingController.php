<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function general()
    {
        return view('backend..page.settings.general');
    }

    public function store(Request $request)
    {
        $datas = $request->all();
        if ($datas['_token']) unset($datas['_token']);
        foreach ($datas as $key => $data) {
            Setting::updateOrCreate(
                [
                    'name' => $key
                ],
                [
                    'name' => $key,
                    'value' => $data,
                ]
            );
        }

        return back()->with('success', __('Updated setting successfully'));
    }
}
