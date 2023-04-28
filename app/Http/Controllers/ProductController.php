<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $mainCategories = Category::all();
        $subCategories  = SubCategory::all();

        return view('admin.product.newProduct', compact('mainCategories', 'subCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        $request->validate([
            'product_name'          => 'required',
            'product_description'   => 'required',
            'product_buying_price'  => 'required',
            'product_selling_price' => 'required',
            'main_category'         => 'required',
            'sub_category'          => 'required',
            'product_quantity'      => 'required',
            'product_images'        => 'mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);

        $product                  = new Product();
        $product->name            = $request->input('product_name');
        $product->sub_category_id = $request->input('sub_category');
        $product->buying_price    = $request->input('product_buying_price');
        $product->selling_price   = $request->input('product_selling_price');
        $product->quantity        = $request->input('product_quantity');

        $images = array();

        if ($request->hasFile('product_images')) {
            $files = $request->file('product_images');
            foreach ($files as $product_image) {
                $imgName = $product_image->getClientOriginalName();
                $ext = $product_image->extension();
                $image_full_name = $imgName. '.' .$ext;
                $product_image->move(public_path('images'), $image_full_name);
                $images[] = $imgName;
            }
        }

        $product->images = implode('|', $images);

        $product->save();

        // dd($images);
        return redirect()->route('product.index')->with('success_message', $request->input('product_name') . ' is added successfully!');
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

    /**
     * Get SubCategory from storage.
     */
    public function getSubCategories($id)
    {
        $subCategories = SubCategory::where('category_id', $id)->pluck('name', 'id');
        // dd($subCategories);
        return response()->json($subCategories);
    }
}