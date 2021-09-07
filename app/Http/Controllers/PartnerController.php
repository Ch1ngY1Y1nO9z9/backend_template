<?php

namespace App\Http\Controllers;

use App\Partner;
use App\Http\Requests\PartnerRequest;

class PartnerController extends Controller
{
    function __construct()
    {
        $this->redirect = '/admin/partner';
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

    public function store(PartnerRequest $request)
    {
        $new_record = Partner::create($request->all());

        if($request->hasFile('img')){
            $new_record->img = upload_file($request->file('img'),'partner');
        }

        $new_record -> save();
        return redirect($this->redirect)->with('success','新增成功!');
    }

    public function show($id)
    {
        $items = Partner::findOrFail($id);
        return view($this->edit,compact('items'));
    }

    public function update(PartnerRequest $request,$id)
    {
        $items = Partner::findOrFail($id);
        $items->update($request->all());

        if($request->hasFile('img')){
            delete_file($items->img);
            $items->img = upload_file($request->file('img'),'partner');
            $items -> save();
        }

        return redirect($this->redirect)->with('success','更新成功!');
    }

    public function destroy($id)
    {
        $items = Partner::findOrFail($id);
        delete_file($items->img);
        $items->delete();

        return redirect($this->redirect)->with('success','刪除成功!');
    }
}
