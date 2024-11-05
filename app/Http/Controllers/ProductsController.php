<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductsController extends Controller
{
    public function showProductsByCategory($category = null)
    {
        # Collection -> Category, Category, Category
        $categories = Category::all();

        dd($categories);

        $products = null;
        
        if($category) {
            $category_id = $categories->firstWhere('name', $category)->id;
            $products = Product::where('category_id', $category_id)->get();
        }

        return view('products')
            ->with('products', $products)
            ->with('category', $category)
            ->with('categories', $categories);
    }
}
