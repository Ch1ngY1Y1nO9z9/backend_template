<?php

namespace App\Http\Controllers;

use App\Products;
use App\ProductsType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductTypeController extends Controller
{

    public function index()
    {
        $items = ProductsType::all();
        return view('admin.productsType.index',compact('items'));
    }

    public function create()
    {
        return view('admin.productsType.create');
    }

    public function store(Request $request)
    {
        $new_record = ProductsType::create($request->all());

        if($request->hasFile('img')){
            $new_record->fill(['img' => $this->upload_file($request->file('img'))]);
        }

        $new_record->save();

        return redirect('/admin/product_type');
    }

    public function show($id)
    {
        $item = ProductsType::find($id);
        return view('admin.productsType.edit',compact('item'));
    }

    public function update(Request $request,$id)
    {
        $item = ProductsType::find($id);
        $item->type_name_ch = $request->type_name_ch;
        $item->subtitle_ch = $request->subtitle_ch;
        $item->sort = $request->sort;

        if($request->hasFile('img')){
            $this->delete_file($item->img);
            $item->img = $this->upload_file($request->file('img'));
        }

        $item->save();

        return redirect('/admin/product_type');
    }

    public function delete(Request $request,$id)
    {
        $item = ProductsType::find($id);

        $products = Products::where('type',$item->id)->get();

        foreach($products as $product){
            $product->type = null;
            $product->save();
        }

        if($item->image_url){
            $this->delete_file($item->image_url);
        }

        $item->delete();

        return redirect()->back();
    }

    //上傳檔案
    public function upload_file($file){
        $allowed_extensions =["png", "jpg", "gif", "PNG", "JPG", "GIF","jpeg","JPEG"];

        if ($file->getClientOriginalExtension() &&
            !in_array($file->getClientOriginalExtension(), $allowed_extensions))
        {
            return redirect()->back()->with('message','僅接受.jpg, .png, .gif, .jepg格式檔案!');
        }
        $extension = $file->getClientOriginalExtension();
        $destinationPath = public_path() . '/productTypes/';
        $original_filename = $file->getClientOriginalName();

        $filename = $file->getFilename() . '.' . $extension;
        $url = '/productTypes/' . $filename;

        $file->move($destinationPath, $filename);

        return $url;
    }

    //刪除檔案
    public function delete_file($path){
        File::delete(public_path().$path);
    }

}
