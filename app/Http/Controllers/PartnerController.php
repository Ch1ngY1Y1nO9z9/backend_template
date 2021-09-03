<?php

namespace App\Http\Controllers;

use App\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PartnerController extends Controller
{
    function __construct()
    {
        $this->redirect = '/admin';
        $this->index = 'admin.partner.index';
        $this->create = 'admin.partner.create';
        $this->edit = 'admin.partner.edit';
    }

    public function index()
    {
        $items = Partner::all();

        return view($this->index,compact('items'));
    }

    public function create()
    {
        return view($this->create);
    }

    public function store(Request $request)
    {
        $new_record = Partner::create($request->all());

        if($request->hasFile('img')){
            $new_record->img = $this->upload_file($request->file('img'));
        }
        $new_record -> save();
        return redirect('/admin/partner')->with('message','新增成功!');
    }

    public function show($id)
    {
        $items = Partner::find($id);
        return view($this->edit,compact('items'));
    }

    public function update(Request $request,$id)
    {
        $items = Partner::find($id);
        $items->update($request->all());

        if($request->hasFile('img')){
            $this->delete_file($items->img);
            $items->img = $this->upload_file($request->file('img'));
            $items -> save();
        }

        return redirect('/admin/partner')->with('message','更新成功!');
    }

    public function destroy($id)
    {
        $items = Partner::find($id);
        $this->delete_file($items->img);
        $items->delete();

        return redirect('/admin/partner')->with('message','刪除成功!');
    }

    //上傳檔案
    public function upload_file($file){
        $allowed_extensions =["png", "jpg", "gif", "PNG", "JPG", "GIF","jpeg","JPEG","pdf"];
        if ($file->getClientOriginalExtension() &&
            !in_array($file->getClientOriginalExtension(), $allowed_extensions))
        {
            return redirect()->back()->with('message','僅接受.jpg, .png, .gif, .jepg, .pdf格式檔案!');
        }
        $extension = $file->getClientOriginalExtension();
        $destinationPath = public_path() . '/upload/partner/';
        $original_filename = $file->getClientOriginalName();

        $filename = $file->getFilename() . '.' . $extension;
        $url = '/upload/partner/' . $filename;

        $file->move($destinationPath, $filename);

        return $url;
    }

    //刪除檔案
    public function delete_file($path){
        File::delete(public_path().$path);
    }
}
