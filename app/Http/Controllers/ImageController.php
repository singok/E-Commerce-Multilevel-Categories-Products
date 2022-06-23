<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.image-list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::orderBy('order', 'ASC')->get();
        return view('dashboard.image-add', ['dataInfo' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        $request->validate([
            'productid' => 'required',
            'specification' => 'required',
            'description' => 'required',
            'images' => 'required'
        ]);
        $images = $request->file('images');
        $files = array();
        foreach($images as $img) {
            $fileName = $img->getClientOriginalName();
            $img->storeAs('public/productimages', $fileName);
            $files[] = $fileName;
        }
        
        // insert details
        $info = Image::create([
            'multipleimages' => implode('|', $files),
            'specification' => $request->specification,
            'description' => $request->description,
            'productid' => $request->productid
        ]);

        if (!empty($info)) {
            return back('success', 'Image and Description Added Successfully.');
        } else {
            return back('error', 'Something went wrong.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
