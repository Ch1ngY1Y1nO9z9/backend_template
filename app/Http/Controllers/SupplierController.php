<?php

namespace App\Http\Controllers;

use App\Supplier;
use App\Http\Requests\SupplierRequest;

class SupplierController extends Controller
{
    function __construct()
    {
        $this->redirect = '/admin/supplier';
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

    public function store(SupplierRequest $request)
    {
        $new_record = Supplier::create($request->all());
        if($request->hasFile('img')){
            $new_record->img = upload_file($request->file('img'),'supplier');
        }
        $new_record -> save();
        return redirect($this->redirect)->with('success','新增成功!');
    }

    public function show($id)
    {
        $items = Supplier::findOrFail($id);
        return view($this->edit,compact('items'));
    }

    public function update(SupplierRequest $request,$id)
    {
        $items = Supplier::findOrFail($id);
        $items->update($request->all());

        if($request->hasFile('img')){
            delete_file($items->img);
            $items->img = upload_file($request->file('img'),'supplier');
            $items -> save();
        }

        return redirect($this->redirect)->with('success','更新成功!');
    }

    public function destroy($id)
    {
        $items = Supplier::findOrFail($id);
        delete_file($items->img);
        $items->delete();

        return redirect($this->redirect)->with('success','刪除成功!');
    }
}
