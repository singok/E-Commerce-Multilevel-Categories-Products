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
        $slug = Str::slug($request->productname, '-').'-'.Str::random(10);
        $info = Product::create([
            'order' => $request->order,
            'productname' => $request->productname,
            'categoryid' => $request->categoryid,
            'slug' => $slug
        ]);
        if (!empty($info)) {
            return redirect()->back()->with('success', 'Product Added Successfully.');
        } else {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }

    // remove product detail
    public function remove($id) {
        $info = Product::where('id', $id)->delete();
        if (!empty($info)) {
            return redirect()->back()->with('success', 'Product deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }

    // diplay edit form
    public function edit($id) {
        $product = Product::where('id', $id)->first();
        $categories = Category::select('id','categoryname')->where('parentid', '!=', 0)->get();
        return view('dashboard.product-update', ['dataInfo' => $product, 'selectItems' => $categories]);
    }

    // update product details
    public function update(Request $request) {
        $request->validate([
            'productname' => 'required',
            'order' => 'required | unique:products',
            'categoryid' => 'required'
        ]);
        $info = Product::where('id', $request->productid)->update([
            'productname' => $request->productname,
            'order' => $request->order,
            'categoryid' => $request->categoryid
        ]);
        if (!empty($info)) {
            return redirect()->back()->with('success', 'Product Updated Successfully.');
        } else {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }
}
