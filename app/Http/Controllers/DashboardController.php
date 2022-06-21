<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index() 
    { 
        return view('dashboard.dash');
    }

    public function displayCategory() {
        $category = Category::orderBy('order', 'ASC')->get();
        return view('dashboard.category', ['dataInfo' => $category]);
    }

    public function addForm() {
        return view('dashboard.categoryAdd');
    }

    public function store(Request $request) {
        $request->validate([
            'order' => 'required | numeric | unique:categories',
            'categoryname' => 'required | unique:categories'
        ]);

        $info = Category::create($request->all());
        if (!empty($info)) {
            return back('success', 'Category Added Successfully.');
        } else {
            return back('error', 'Something went wrong.');
        }
    }
}
