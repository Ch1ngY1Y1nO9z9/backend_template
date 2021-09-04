<?php

namespace App\Http\Controllers;

use App\Seo;
use App\Http\Requests\SeoRequest;

class SeoController extends Controller
{
    public function index() {
        $seo = Seo::firstOrCreate([]);
        return view('admin.seo.index',compact('seo'));
    }

    public function update(SeoRequest $request) {
        $data = $request->all();
        Seo::first()->update($data);
        return redirect('/admin/seo')->with('success','更新成功!');
    }

}
