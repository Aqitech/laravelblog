<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;
use Session;


class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $title = 'Site Settings';
        $setting = Settings::first();

        return view('admin.settings.index')->with(compact('title','setting'));
    }

    public function update()
    {
        $this->validate(request(), [
            'site_name' => 'required',
            'contact_email' => 'required',
            'contact_number' => 'required',
            'address' => 'required',
        ]);

        $setting = Settings::first();

        $setting->site_name = request()->site_name;
        $setting->contact_email = request()->contact_email;
        $setting->contact_number = request()->contact_number;
        $setting->address = request()->address;
        $setting->save();

        Session::flash('success','Site Settings Update Successfuly!');
        return redirect()->route('dashboard');
    }
}
