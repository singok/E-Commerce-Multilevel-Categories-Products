<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class FrontController extends Controller
{
    // display homepage 
    public function index() {
        
        // get all categories
        $categories = Category::with('subcategory')->where('parentid', 0)->get();
        return view('homepage', ['categoryInfo' => $categories]);
    }
}
