<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SupplierController extends Controller
{
    function __construct()
    {
        $this->redirect = '/admin';
        $this->index = 'admin.supplier.index';
        $this->create = 'admin.supplier.create';
        $this->edit = 'admin.supplier.edit';
    }

    public function index()
    {
        $items = Supplier::all();

        return view($this->index,compact('items'));
    }

    public function create()
    {
        return view($this->create);
    }

    public function store(Request $request)
    {
        $new_record = Supplier::create($request->all());
        if($request->hasFile('img')){
            $new_record->img = upload_file($request->file('img'),'supplier');
        }
        $new_record -> save();
        return redirect('/admin/supplier')->with('message','新增成功!');
    }

    public function show($id)
    {
        $items = Supplier::find($id);
        return view($this->edit,compact('items'));
    }

    public function update(Request $request,$id)
    {
        $items = Supplier::find($id);
        $items->update($request->all());

        if($request->hasFile('img')){
            $this->delete_file($items->img);
            $items->img = $this->upload_file($request->file('img'));
            $items -> save();
        }


        return redirect('/admin/supplier')->with('message','更新成功!');
    }

    public function destroy($id)
    {
        $items = Supplier::find($id);
        delete_file($items->img);
        $items->delete();

        return redirect('/admin/supplier')->with('message','刪除成功!');
    }
}
