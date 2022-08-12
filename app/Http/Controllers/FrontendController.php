<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function main()
    {
        $product = Product::all();
        $category = Category::orderBy('name','ASC')->get();
        return view('frontend.main', compact('product', 'category'));
    }
    public function index()
    {
        $category = Category::orderBy('name','ASC')->get();
        $product = Product::limit(10)->orderBy('id','DESC')->get();
        return view('frontend.index', compact('category', 'product'));
    }
    public function contact()
    {
        return view('frontend.contact');
    }
    public function productfe()
    {
        $category = Category::orderBy('name','ASC')->get();
        $product = Product::limit(10)->orderBy('id','DESC')->get();
        return view('frontend.productfe', compact('category', 'product'));
    }
    public function cart()
    {
        return view('frontend.cart');
    }
    public function detail()
    {
        return view('frontend.detail');
    }
}
