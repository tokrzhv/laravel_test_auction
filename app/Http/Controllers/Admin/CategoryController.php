<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }
    public function show(Category $category){
        return view('admin.category.show', compact('category'));
    }
    public function create(){
        return view('admin.category.create');
    }
    public function edit(Category $category){
        return view('admin.category.edit', compact('category'));
    }
    public function store(StoreRequest $request){
        Category::firstOrCreate($request->validated());
        return redirect()->route('admin.category.index');
    }
    public function update(UpdateRequest $request, Category $category){
        $category->update($request->validated());
        return view('admin.category.show', compact('category'));
    }
    public function delete(Category $category){
        $category->delete();
        return redirect()->route('admin.category.index');
    }
}
