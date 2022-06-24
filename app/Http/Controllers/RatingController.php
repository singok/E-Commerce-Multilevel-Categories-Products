<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Product;

class RatingController extends Controller
{
    // show all ratings
    public function index($id)
    {
        $rating = Rating::where('productid', $id)->get();
        $productName = Product::where('id', $id)->first();
        return view('dashboard.rating', ['dataInfo' => $rating, 'productname' => $productName->productname]);
    }

    // remove ratings details
    public function remove($id)
    {
        $info = Rating::where('id', $id)->delete();
        if(!empty($info)) {
            return redirect()->back()->with('success', 'Rating Removed Successfully.');
        } else {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }

}
