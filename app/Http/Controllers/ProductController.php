<?php

namespace App\Http\Controllers;

use \Str;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::with('subcategory')->get(); // Eager load subcategory

        return view('backend.product.index', compact('products'));
    }
    public function create()
    {
        $categories = Category::all(); // Get all subcategories
        return view('backend.product.create', compact('categories'));
    }
    public function store(Request $request)
{
    try {
        $request->validate([
            'name' => 'required|string|max:255',
            'subcategory_id' => 'required|exists:subcategories,id',
            'description' => 'nullable|string',
           'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'old_price' => 'nullable|numeric',
            'new_price' => 'required|numeric',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        } else {
            $imagePath = null; 
        }

        // Create the product
        Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'description' => $request->description,
            'image' => $imagePath,
            'old_price' => $request->old_price,
            'new_price' => $request->new_price,
            'slug' => \Illuminate\Support\Str::slug($request->name), // Create a slug
        ]);

        // Success message
        Toastr::success('Product added successfully!', 'Success');
        return redirect()->route('backend.product.index');
    } catch (\Illuminate\Validation\ValidationException $e) {
        // Get validation errors
        $errors = $e->validator->errors()->all();

        // Show Toastr error messages
        foreach ($errors as $error) {
            Toastr::error($error);
        }
        return redirect()->back()->withInput();
    }
}

public function edit($id)
{
    $product = Product::findOrFail($id);  
    $categories = Category::with('subcategories')->get();  
    return view('backend.product.edit', compact('product', 'categories'));
}
public function update(Request $request, $id)
{
    try {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'subcategory_id' => 'required',
            'new_price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($product->image);
            }
            $imagePath = $request->file('image')->store('products', 'public');
        } else {
            $imagePath = $product->image;
        }

        $product->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'description' => $request->description,
            'old_price' => $request->old_price,
            'new_price' => $request->new_price,
            'image' => $imagePath,
            'slug' => \Illuminate\Support\Str::slug($request->name)
        ]);

        Toastr::success('Product Updated', 'Success');
        return redirect()->route('backend.product.index');
        
    } catch (\Illuminate\Validation\ValidationException $e) {
        $errors = $e->validator->errors()->all();

        foreach ($errors as $error) {
            Toastr::error($error);
        }

        return redirect()->back()->withInput();
    }
}

public function destroy($id)
{
 
    $product = Product::findOrFail($id);

 
    $product->delete();
    Toastr::success('Product Deleted', 'Success');
    return redirect()->route('backend.product.index');
}

}
