<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductTypeRequest;
use App\Products;
use App\ProductsType;

class ProductTypeController extends Controller
{
    function __construct()
    {
        $this->redirect = '/admin/product_type';
        $this->index = 'admin.productsType.index';
        $this->create = 'admin.productsType.create';
        $this->edit = 'admin.productsType.edit';
    }

    public function index()
    {
        $items = ProductsType::all();

        return view($this->index, compact('items'));
    }

    public function create()
    {
        return view($this->create);
    }

    public function store(ProductTypeRequest $request)
    {
        $new_record = ProductsType::create($request->all());

        if($request->hasFile('img')){
            $new_record->img = upload_file($request->file('img'),'product_type');
        }

        $new_record->save();

        return redirect($this->redirect)->with('success','新增成功!');
    }

    public function show($id)
    {
        $item = ProductsType::find($id);
        return view('admin.productsType.edit',compact('item'));
    }

    public function update(ProductTypeRequest $request,$id)
    {
        $item = ProductsType::find($id);
        $item->update($request->all());

        if($request->hasFile('img')){
            delete_file($item->img);
            $item->img = upload_file($request->file('img'),'product_type');
        }

        $item->save();

        return redirect($this->redirect)->with('success','更新成功!');
    }

    public function destroy($id)
    {
        $item = ProductsType::find($id);

        $products = Products::where('type',$item->id)->get();

        foreach($products as $product){
            $product->type = null;
            $product->save();
        }

        if($item->image_url){
            delete_file($item->image_url);
        }

        $item->delete();

        return redirect($this->redirect)->with('success','刪除成功!');
    }
}
