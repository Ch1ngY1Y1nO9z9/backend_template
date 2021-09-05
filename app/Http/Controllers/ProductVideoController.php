<?php

namespace App\Http\Controllers;

use App\ProductVideo;
use App\Http\Requests\ProductVideoRequest;

class ProductVideoController extends Controller
{
    function __construct()
    {
        $this->redirect = '/admin/product_video';
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

    public function store(ProductVideoRequest $request)
    {
        $new_record = ProductVideo::create($request->all());
        if($request->hasFile('img')){
            $new_record->img = upload_file($request->file('img'),'productVideo');
        }
        $new_record -> save();

        return redirect($this->redirect)->with('success','新增成功!');
    }

    public function show($id)
    {
        $items = ProductVideo::findOrFail($id);
        return view($this->edit,compact('items'));
    }

    public function update(ProductVideoRequest $request,$id)
    {
        $items = ProductVideo::findOrFail($id);
        $items -> title_ch = $request->title_ch;
        $items -> links = $request->links;
        if($request->hasFile('img')){
            delete_file($items->img);
            $items->img = upload_file($request->file('img'),'productVideo');
        }

        $items -> sort = $request->sort;

        $items -> save();

        return redirect($this->redirect)->with('success','更新成功!');
    }

    public function destroy($id)
    {
        $items = ProductVideo::findOrFail($id);
        delete_file($items->img);
        $items->delete();

        return redirect($this->redirect)->with('success','刪除成功!');
    }
}
