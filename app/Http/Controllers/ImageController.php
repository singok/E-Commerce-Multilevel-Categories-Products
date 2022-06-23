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
        $products = Image::with('product')->get();
        return view('dashboard.image-list', ['dataInfo' => $products]);
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
            'description' => 'required | unique:product_image',
            'images' => 'required',
            'price' => 'required'
        ]);
        $images = $request->file('images');
        $files = array();
        foreach($images as $img) {
            $fileName = time().'_'.$img->getClientOriginalName();
            $img->storeAs('public/productimages', $fileName);
            $files[] = $fileName;
        }
        // insert details
        $info = Image::create([
            'price' => $request->price,
            'multipleimages' => implode('|', $files),
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
        $selectProduct = Product::all();
        $image = Image::where('id', $id)->first();
        return view('dashboard.image-edit', ['dataInfo' => $image,'selectProductItems' => $selectProduct]);
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
        $pathDeleted = NULL;
        $image = Image::find($id);
        $imageArray = explode('|', $image->multipleimages);
        foreach ($imageArray as $img) {
            Storage::delete('public/productimages/'.$img);
            $pathDeleted = 1;
        }
        $imageDetailDeleted = $image->delete();
        if (!empty($imageDetailDeleted) && !empty($pathDeleted)) {
            return back('success', 'Product deleted successfully.');
        } else {
            return back('error', 'Something went wrong.');
        }
    }

    // show all specification list
    public function showSpecification($id) {
        return view('dashboard.specification-list');
    }
}
