<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Specification;

class SpecificationController extends Controller
{
    // show specification list
    public function index($productname, $id)
    {
        $specification = Specification::where('productid', $id)->get();
        return view('dashboard.specification-list', ['dataInfo' => $specification, 'productname' => $productname, 'productid' => $id]);
    }

    // insert specification details
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        $info = Specification::create([
            'productid' => $request->productid,
            'title' => $request->title,
            'description' => $request->description
        ]);
        if (!empty($info)) {
            return redirect()->back()->with('success', 'Specification Added.');
        } else {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }

    // remove specification details
    public function destroy($id)
    {
        $info = Specification::where('id', $id)->delete();
        if (!empty($info)) {
            return back()->with('success', 'Specification Deleted Successfully.');
        } else {
            return back()->with('error', 'Something went wrong.');
        }
    }

    // show specification details
    public function edit($id)
    {
        $info = Specification::where('id', $id)->first();
        return view('dashboard.specification-edit', ['dataInfo' => $info, 'specId' => $id]);
    }

    // update specification details
    public function update(Request $request)
    {
        
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'specificationId' => 'required'
        ]);
        $info = Specification::where('id', $request->specificationId)->update([
            'title' => $request->title,
            'description' => $request->description
        ]);
        if (!empty($info)) {
            return redirect()->back()->with('success', 'Specification Details Updated Successfully.');
        } else {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }
}
