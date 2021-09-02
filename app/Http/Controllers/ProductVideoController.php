<?php

namespace App\Http\Controllers;

use App\ProductVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductVideoController extends Controller
{
    function __construct()
    {
        $this->redirect = '/admin';
        $this->index = 'admin.productVideo.index';
        $this->create = 'admin.productVideo.create';
        $this->edit = 'admin.productVideo.edit';
    }

    public function index()
    {
        $items = ProductVideo::all();

        return view($this->index,compact('items'));
    }

    public function create()
    {
        return view($this->create);
    }

    public function store(Request $request)
    {
        $new_record = new ProductVideo();
        $new_record -> title_ch = $request->title_ch;
        $new_record -> links = $request->links;

        if($request->hasFile('img')){
            $new_record->img = $this->upload_file($request->file('img'));
        }

        $new_record -> sort = $request->sort;

        $new_record -> save();
        return redirect('/admin/product_video')->with('message','新增成功!');
    }

    public function edit($id)
    {
        $items = ProductVideo::find($id);
        return view($this->edit,compact('items'));
    }

    public function update(Request $request,$id)
    {
        $items = ProductVideo::find($id);
        $items -> title_ch = $request->title_ch;
        $items -> links = $request->links;
        if($request->hasFile('img')){
            $this->delete_file($items->img);
            $items->img = $this->upload_file($request->file('img'));
        }

        $items -> sort = $request->sort;

        $items -> save();

        return redirect('/admin/product_video')->with('message','更新成功!');
    }

    public function delete($id)
    {
        $items = ProductVideo::find($id);
        $this->delete_file($items->img);
        $items->delete();

        return redirect('/admin/product_video')->with('message','刪除成功!');
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
        $destinationPath = public_path() . '/upload/product_video/';
        $original_filename = $file->getClientOriginalName();

        $filename = $file->getFilename() . '.' . $extension;
        $url = '/upload/product_video/' . $filename;

        $file->move($destinationPath, $filename);

        return $url;
    }

    //刪除檔案
    public function delete_file($path){
        File::delete(public_path().$path);
    }
}
