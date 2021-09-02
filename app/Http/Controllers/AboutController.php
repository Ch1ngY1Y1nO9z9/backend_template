<?php

namespace App\Http\Controllers;

use App\AboutUs;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index() {
        $about = AboutUs::firstOrCreate([]);
        return view('admin.about_us.index',compact('about'));
    }

    public function update(Request $request) {
        $data = $request->all();
        AboutUs::first()->update($data);
        return redirect('/admin/about_us')->with('success','更新成功!');
    }

}
