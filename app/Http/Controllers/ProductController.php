<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    // list all products
    public function index() {
        $products = Product::with('category')->orderBy('order', 'ASC')->get();
        return view('dashboard.product-list', ['dataInfo' => $products]);
    }

    // show product add form
    public function add() {
        $val = Category::select('id','categoryname')->where('parentid', '!=', 0)->get();
        return view('dashboard.product-add', ['dataInfo' => $val]);
    }

    // insert product details
    public function store(Request $request) {
        $request->validate([
            'order' => 'required | unique:products',
            'productname' => 'required',
            'categoryid' => 'required'
        ]);
        $slug = Str::slug(time().Str::random(50));
        $info = Product::create([
            'order' => $request->order,
            'productname' => $request->productname,
            'categoryid' => $request->categoryid,
            'slug' => $slug
        ]);
        if (!empty($info)) {
            return redirect()->back('success', 'Product Added Successfully.');
        } else {
            return redirect()->back('error', 'Something went wrong.');
        }
    }
}
