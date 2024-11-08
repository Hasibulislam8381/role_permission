<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $category = Category::get();
        return view('backend.category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        $category = new Category();
        $category->name = $request->name;
        $category->slug = \Illuminate\Support\Str::slug($request->name);
        $category->save();
        Toastr::success('Category Added', 'Success');
        return redirect()->route('backend.category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
        return view('backend.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        $category = Category::findOrFail($category->id);
        $category->name = $request->name;
        $category->slug = \Illuminate\Support\Str::slug($request->name);
        $category->save();
        Toastr::success('Category Updated', 'Success');
        return redirect()->route('backend.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        Toastr::success('Category Deleted', 'Success');
        return redirect()->route('backend.category.index');
    }
    
}
