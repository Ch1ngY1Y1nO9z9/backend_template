<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\News;


class NewsController extends Controller
{
    function __construct()
    {
        $this->redirect = '/admin/news';
        $this->index = 'admin.news.index';
        $this->create = 'admin.news.create';
        $this->edit = 'admin.news.edit';
    }

    public function index()
    {
        $news_lists = News::all();
        return view($this->index,compact('news_lists'));
    }
    public function create()
    {
        return view($this->create);
    }

    public function store(NewsRequest $request)
    {
        $new_record = News::create($request->all());
        if($request->hasFile('img')){
            $new_record->img = upload_file($request->file('img'));
        }
        $new_record->save();

        return redirect($this->redirect)->with('success','新增成功!');

    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        return view($this->edit,compact('news'));
    }

    public function update(NewsRequest $request,$id)
    {
        $items = News::find($id);
        $items->update($request->all());
        if($request->hasFile('img')){
            delete_file($items->img);
            $items->img = upload_file($request->file('img'));
            $items->save();
        }

        return redirect($this->redirect)->with('success','更新成功!');
    }

    public function destroy($id)
    {
        $item = News::find($id);
        delete_file($item->img);
        $item->delete();

        return redirect($this->redirect)->with('success','刪除成功!');
    }
}
