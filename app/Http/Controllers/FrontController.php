<?php

namespace App\Http\Controllers;

use App\Banners;
use App\AboutUs;
use App\ContactUs;
use App\News;
use App\Products;
use App\ProductsType;
use App\Supplier;
use App\ProductVideo;
use App\Partner;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index() {
        $banners = Banners::orderBy('sort','desc')->get();
        $all_news = News::orderBy('sort','desc')->take(4)->get();
        $productTypes = ProductsType::orderBy('sort','desc')->get();
        $suppliers = Supplier::orderBy('sort','desc')->get();
        $productVideos = ProductVideo::orderBy('sort','desc')->get();
        $partners = Partner::orderBy('sort','desc')->get();

        return view('front.index',compact('banners','all_news','productTypes','suppliers','productVideos','partners'));
    }

    public function about_us()
    {
        $about = AboutUs::where('id', 1)->first();
        return view('front.about',compact('about'));
    }

    public function news() {
        $all_news = News::orderBy('sort','desc')->get();
        return view('front.news',compact('all_news'));
    }

    public function news_detail($id) {
        $news = News::find($id);
        return view('front.news_detail',compact('news'));
    }

    public function Types($id) {
        $type = ProductsType::find($id);
        $products = Products::where('type',$type->id)->orderBy('sort','desc')->get();
        return view('front.product',compact('type','products'));
    }

    public function Products($id) {
        $product = Products::find($id);
        return view('front.productDetail',compact('product'));
    }

    public function contact_us(Request $request) {
        $validate = Validator::make(Input::all(), [
            'g-recaptcha-response' => 'required|captcha'
        ]);
        ContactUs::create($request->all());
        return redirect('/');
    }
}
