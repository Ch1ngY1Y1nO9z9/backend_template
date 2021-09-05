<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsRequest;
use App\Products;
use App\ProductsType;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    function __construct()
    {
        $this->redirect = '/admin/products';
        $this->index = 'admin.products.index';
        $this->create = 'admin.products.create';
        $this->edit = 'admin.products.edit';
    }

    public function index()
    {
        $items = Products::all();
        return view($this->index, compact('items'));
    }

    public function create()
    {
        $types = ProductsType::all();

        return view($this->create, compact('types'));
    }

    public function store(ProductsRequest $request)
    {
        $new_record =  Products::create($request->all());

        if($request->hasFile('img')){
            $new_record->img = upload_file($request->file('img'),'products');
        }

        $new_record->save();

        return redirect($this->redirect)->with('success','新增成功!');
    }

    public function show($id)
    {
        $item = Products::findOrFail($id);
        $types = ProductsType::all();
        return view('admin.products.edit',compact('item','types'));
    }

    public function update(ProductsRequest $request,$id)
    {
        $item = Products::find($id);
        $item->update($request->all());
        if($request->hasFile('img')){
            delete_file($item->img);
            $item->img = upload_file($request->file('img'),'products');
        }

        $item->save();

        return redirect($this->redirect)->with('success','更新成功!');
    }

    public function destroy($id)
    {
        $items = Products::find($id);

        if($items->img){
            delete_file($items->img);
        }

        $items->delete();

        return redirect($this->redirect)->with('success','刪除成功!');
    }
}
