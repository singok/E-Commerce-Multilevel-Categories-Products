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
            return redirect()->back('success', 'Specification Added.');
        } else {
            return redirect()->back('error', 'Something went wrong.');
        }
    }

    // remove specification details
    public function destroy($id)
    {
        $info = Specification::where('id', $id)->delete();
        if (!empty($info)) {
            return back('success', 'Specification Deleted Successfully.');
        } else {
            return back('error', 'Something went wrong.');
        }
    }

    // show specification details
    public function edit($id)
    {
        $info = Specification::where('productid', $id)->first();
        if (!empty($info)) {
            return json_encode($nfo);
        }
    }
}
