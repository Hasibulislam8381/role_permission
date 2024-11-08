<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{
    //
    public function index(){
        $categories  = Category::get();
        $subcategories = Subcategory::get();
        return view('backend.subcategory.index',compact('subcategories','categories'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        Subcategory::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'category_id' => $validated['category_id'],
        ]);
        Toastr::success('Subcategory Added', 'Success');
        return redirect()->route('backend.subcategory.index');
    }

   
    public function edit(Subcategory $subcategory)
    {
        $categories = Category::all(); // Fetch all categories for the dropdown
        return view('backend.subcategory.edit', compact('subcategory', 'categories'));
    }

    public function update(Request $request, Subcategory $subcategory)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        $subcategory->update([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'category_id' => $validated['category_id'],
        ]);
        Toastr::success('Subcategory Updated', 'Success');
        return redirect()->route('backend.subcategory.index')->with('success', 'Subcategory updated successfully!');
    }
    

public function destroy(Subcategory $subcategory)
{
    $subcategory->delete(); // Delete the subcategory
    Toastr::success('Subcategory Deleted', 'Success');
    return redirect()->route('backend.subcategory.index');
}


}
