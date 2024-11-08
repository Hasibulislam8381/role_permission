<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ViewProductController extends Controller
{
    //
    public function index(){
        $products = \App\Models\Product::all();
        $categories=Category::all();
        return view('frontend.index',compact('products','categories'));
    }
    public function filterBySubcategory($subcategorySlug)
    {
        $subcategory = Subcategory::where('slug', $subcategorySlug)->firstOrFail();
        $products = Product::where('subcategory_id', $subcategory->id)->get();
        $categories = Category::with('subcategories')->get(); // Get categories to display in the dropdown

        return view('frontend.filtered', compact('products', 'categories'));
    }
    public function product_details($slug)
{
    $product = Product::where('slug', $slug)->firstOrFail();
    $relatedProducts = Product::where('subcategory_id', $product->subcategory_id)
                              ->where('id', '!=', $product->id)
                              ->limit(4)
                              ->get(); 

    return view('frontend.product_details', compact('product', 'relatedProducts'));
}



}
