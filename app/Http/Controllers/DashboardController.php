<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    // display dashboard
    public function index() 
    { 
        $count = Category::count();
        return view('dashboard.dash', ['categoryCount' => $count]);
    }

    // display all available categories
    public function displayCategory() {
        $category = Category::with('parent')->orderBy('order', 'ASC')->get();
        return view('dashboard.category', ['dataInfo' => $category]);
    }

    // display add category form
    public function addForm() {
        $category = Category::where('parentid', 0)->get();
        return view('dashboard.categoryAdd', ['dataInfo' => $category]);
    }

    // insert category detail
    public function store(Request $request) {
        $request->validate([
            'order' => 'required | numeric | unique:categories',
            'categoryname' => 'required'
        ]);
        $autoSlug = Str::slug($request->categoryname.time().Str::random(50), '-');
        $info = Category::create([
            'categoryname' => $request->categoryname,
            'slug' => $autoSlug,
            'parentid' => $request->parentid,
            'order' => $request->order
        ]);
        if (!empty($info)) {
            return back('success', 'Category Added Successfully.');
        } else {
            return back('error', 'Something went wrong.');
        }
    }

    // move categories to bin
    public function destroy($id) {
        $category = Category::firstWhere('id', $id);
        
        if ($category->parentid == 0) {
            $subCategory = Category::where('parentid', $category->id)->delete();
        }

        $info = $category->delete();
        if ($info) {
            return back('success', 'Category Deleted Successfully.');
        } else {
            return back('error', 'Something went wrong');
        }
    }

    // show category edit form
    public function edit($id) {
        $category = Category::where('id', $id)->first();
        $items = Category::where('parentid', 0)->get(); 
        if ($category) {
            return view('dashboard.categoryUpdate', ['dataInfo' => $category, 'selectItems' => $items]);
        }
    }

    // show category trash bin
    public function displayTrashedCategory() {
        $category = Category::onlyTrashed()->get();
        return view('dashboard.category-restore', ['dataInfo' => $category]);
    }

    // restore category
    public function restoreCategory($id) {
        $info = Category::withTrashed()->where('id', $id)->orWhere('parentid', $id)->restore();
        if ($info) {
            return back()->with('success', 'Category restored successfully.');
        } else {
            return back()->with('error', 'Something went wrong.');
        }
    }

    // delete Permanently
    public function deletePermanently($id) {
        $info = Category::withTrashed()->where('id', $id)->orWhere('parentid', $id)->forceDelete();
        if ($info) {
            return back('success', 'Category Deleted Successfully');
        } else {
            return back('error', 'Something went wrong.');
        }
    }

    // update category
    public function updateCategory(Request $request) {
        $request->validate([
            'categoryname' => 'required',
            'order' => 'required',
            'parentid' => 'required',
        ]);

        $cid = $request->categoryid;
        $info = Category::where('id', $cid)->update([
            'categoryname' => $request->categoryname,
            'order' => $request->order,
            'parentid' => $request->parentid
        ]);
        Category::where('parentid', $cid)->update([
            'parentid' => $cid
        ]);
        return back('success', 'Category Updated Successfully.');
    }
}
