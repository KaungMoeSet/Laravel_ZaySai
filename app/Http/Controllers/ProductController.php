<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::all();

        return view('admin.product.productsList', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $subCategories = SubCategory::all();

        return view('admin.product.newProduct', compact('subCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if ($request->hasFile('course_img')) 
        {
            if ($request->file('course_img')->isValid()) {
                $validated  = $request->validate(['course_img' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',]);
                $extension  = $request->course_img->extension();
                $randomName = rand() . "." . $extension;
                $request->course_img->storeAs('/public/img/', $randomName);
            }
        }

        

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}