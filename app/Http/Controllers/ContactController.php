<?php

namespace App\Http\Controllers;

use App\ContactUs;

class ContactController extends Controller
{
    public function index(){
        $lists = ContactUs::all();
        return view('admin.contact.index',compact('lists'));
    }

    public function show($id){
        $contact_info = ContactUs::findOrFail($id);
        return view('admin.contact.show',compact('contact_info'));
    }

    public function delete($id){
        $items = ContactUs::find($id);
        $items->delete();

        return redirect('/admin/contact')->with('success','刪除成功!');
    }
}
