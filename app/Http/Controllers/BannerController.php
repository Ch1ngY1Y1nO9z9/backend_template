<?php

namespace App\Http\Controllers;

use App\Banners;
use Illuminate\Http\Request;
use App\Http\Requests\ImageRequest;
use App\Http\Requests\BannerRequest;

class BannerController extends Controller
{
    function __construct()
    {
        $this->redirect = '/admin';
        $this->index = 'admin.banners.index';
        $this->create = 'admin.banners.create';
        $this->edit = 'admin.banners.edit';
    }

    public function index()
    {
        $items = Banners::all();

        return view($this->index,compact('items'));
    }

    public function create()
    {
        return view($this->create);
    }

    public function store(BannerRequest $request)
    {
        $new_record = Banners::create($request->all());
        $new_record->img = upload_file($request->file('img'),'banner');
        $new_record->save();

        return redirect('/admin/banner')->with('success','新增成功!');
    }

    public function show($id)
    {
        $items = Banners::find($id);
        return view($this->edit,compact('items'));
    }

    public function update(BannerRequest $request,$id)
    {
        $items = Banners::find($id);
        $items -> update($request->all());
        if($request->hasFile('img')){
            delete_file($items->img);
            $items->img = upload_file($request->file('img'),'banner');
            $items -> save();
        }

        return redirect('/admin/banner')->with('success','更新成功!');
    }

    public function destroy($id)
    {
        $items = Banners::find($id);
        delete_file($items->img);
        $items->delete();

        return redirect('/admin/banner')->with('success','刪除成功!');
    }

}
