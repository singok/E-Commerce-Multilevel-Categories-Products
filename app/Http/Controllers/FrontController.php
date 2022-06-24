<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\Product; 

class FrontController extends Controller
{
    // display homepage 
    public function index() {

        // get all categories
        $categories = Category::with('subcategory')->where('parentid', 0)->get();
        return view('homepage', ['categoryInfo' => $categories]);
    }

    public function display($id) {
        $categories = Category::with('subcategory')->where('parentid', 0)->get();
        $products = Product::with('category')->where('categoryid', $id)->get();
        // page title
        $pageTitle = Category::select('categoryname')->where('id', $id)->first();
        // $productImage = Product::with('category','image', 'specification', 'review')->get();
        return view('products.products', ['categoryInfo' => $categories, 'products' => $products, 'pageTitle' => $pageTitle->categoryname]);
    }
}
