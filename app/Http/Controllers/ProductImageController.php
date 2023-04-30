<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductImage $productImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductImage $productImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductImage $productImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(ProductImage $productImage)
    // {
    //     //
    //     $productImageName = ProductImage::find($productImage)->name;
    //     ProductImage::find($productImage)->delete();

    //     return redirect()->back()->with('success_message', $productImageName.' is deleted successfully!');
    // }
    public function destroy(string $id)
    {
        //
        $productImage = ProductImage::find($id)->image_name;
        // dd($productImage);
        ProductImage::find($id)->delete();

        $path = "public/img/{$productImage}";
        if(Storage::exists($path)) {
            Storage::delete($path);
        }

        return redirect()->back()->with('success_message', $productImage . ' is deleted successfully!');
    }
}
