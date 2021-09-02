<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class NewsController extends Controller
{
    public function index()
    {
        $news_lists = News::orderBy('id','desc')->get();
        return view('admin.news.index',compact('news_lists'));
    }
    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $new_record = News::create($request->all());
        if($request->hasFile('img')){
            $new_record->img = $this->upload_file($request->file('img'));
        }
        $new_record->save();

        return redirect('/admin/news');

    }

    public function edit($id)
    {
        $news = News::find($id);
        return view('admin.news.edit',compact('news'));
    }

    public function update(Request $request,$id)
    {
        $items = News::find($id);
        $items->title_ch = $request->title_ch;
        $items->content_ch = $request->content_ch;
        $items->datail_ch = $request->datail_ch;
        $items->sort = $request->sort;
        if($request->hasFile('img')){
            $this->delete_file($items->img);
            $items->img = $this->upload_file($request->file('img'));
        }


        $items->save();

        return redirect('/admin/news');
    }

    public function delete(Request $request,$id)
    {
        $item = News::find($id);

        if($item->img){
            $this->delete_file($item->img);
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
        $destinationPath = public_path() . '/news_upload/';
        $original_filename = $file->getClientOriginalName();

        $filename = $file->getFilename() . '.' . $extension;
        $url = '/news_upload/' . $filename;

        $file->move($destinationPath, $filename);

        return $url;
    }

    //刪除檔案
    public function delete_file($path){
        File::delete(public_path().$path);
    }
}
