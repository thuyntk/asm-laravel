<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        $productsPaginate = Product::select('id', 'name','price', 'thumbnail_url', 'status', 'content')
        ->paginate(5);
        return view('backend.product.product-list', ['product_list' => $productsPaginate],  compact('products'));
    }
    public function delete(Product $product)
    {
        $product->delete();
        return redirect()->back();
    }
    public function create()
    {
        $categories = Category::all();
        return view('backend.product.product-add', compact('categories'));
    }
    private function saveFile($file, $prefixName = '', $folder = 'public')
    {
        if ($file) {
            $fileName = $file->hashName();
            $fileName = isset($prefixName)
                ? $prefixName . '_' . $fileName
                : $fileName;
            return $file->storeAs($folder, $fileName);
        }
    }
    public function store(Request $request, Product $product)
    {
        $product = new Product();
        $product->fill($request->all());
        if ($request->hasFile('thumbnail_url')){
            $thumbnail_url = $request->thumbnail_url;
            $thumbnail_urlName = $thumbnail_url->hashName();
            $thumbnail_urlName = $request->thumbnail_urlname . '_' . $thumbnail_urlName;
            $product->thumbnail_url = $thumbnail_url->storeAs('images/products',$thumbnail_urlName);
        }else{
            $product->thumbnail_url = '';
        }
        $product->save();
        return redirect()->route('admin.products.list');
    }
 
    public function edit(Product $product){
        $categories = Category::all();
        return view('backend.product.product-add', ['product' => $product] , compact('categories'));
    }
    public function update(Request $request,Product $product) {
        $product->fill($request->all());
        $product->fill($request->all());
        if ($request->hasFile('thumbnail_url')){
            $thumbnail_url = $request->thumbnail_url;
            $thumbnail_urlName = $thumbnail_url->hashName();
            $thumbnail_urlName = $request->thumbnail_urlname . '_' . $thumbnail_urlName;
            $product->thumbnail_url = $thumbnail_url->storeAs('images/products',$thumbnail_urlName);
        }else{
            $product->thumbnail_url = '';
        }
        $product->save();

        return redirect()->route('admin.products.list');
    }
}
