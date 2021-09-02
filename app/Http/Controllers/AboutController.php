<?php

namespace App\Http\Controllers;

use App\AboutUs;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index() {
        $about = AboutUs::where('id', 1)->first();
        return view('admin.about_us.index',compact('about'));
    }

    public function update(Request $request) {
        $data = $request->all();
        AboutUs::find(1)->update($data);
        return redirect('/admin/about_us')->with('message','更新成功!');
    }

}
