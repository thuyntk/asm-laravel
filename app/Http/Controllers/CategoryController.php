<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categorysPaginate = Category::select('id', 'name')
        ->paginate(5);
        return view('backend.category.category-list', ['category_list' => $categorysPaginate]);
    }
    public function delete(Category $category)
    {
        $category->delete();
        return redirect()->back();
    }
    public function create()
    {
        return view('backend.category.category-add');
    }
    public function store(Request $request, Category $category)
    {
        $category->fill($request->all());
        $category->save();
        return redirect()->route('admin.categorys.list');
    }
 
    public function edit(Category $category){
        return view('backend.category.category-add', ['category' => $category]);
    }
    public function update(Request $request, Category $category) {
        $category->fill($request->all());
        $category->save();
        return redirect()->route('admin.categorys.list');
    }
}