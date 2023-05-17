<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\SellingPrice;
use App\Models\SubCategory;
use Carbon\Carbon;
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
        $request->validate([
            'product_name'          => 'required',
            'product_description'   => 'required',
            'product_buying_price'  => 'required|numeric|min:0',
            'product_selling_price' => 'required|numeric|min:0',
            'main_category'         => 'required',
            'sub_category'          => 'required',
            'product_quantity'      => 'required',
            'product_images'        => 'required',
        ]);

        $product                  = new Product();
        $product->name            = $request->input('product_name');
        $product->sub_category_id = $request->input('sub_category');
        $product->buying_price    = $request->input('product_buying_price');
        $product->quantity        = $request->input('product_quantity');
        $product->description     = $request->input('product_description');
        $product->save();

        $sellingPrice                = new SellingPrice();
        $sellingPrice->selling_price = $request->input('product_selling_price');
        $sellingPrice->product_id    = $product->id;

        $product_images = $request->file('product_images');
        // dd($product_images);

        foreach ($product_images as $product_image) {
            $extension  = $product_image->extension();
            $randomName = rand() . "." . $extension;
            $product_image->storeAs('/public/img/', $randomName);

            $image             = new ProductImage();
            $image->product_id = $product->id;
            $image->image_name = $randomName;
            // dd($randomName);
            // dd($product_image);
            $product->images()->createMany([
                ['image_name' => $randomName, 'product_id' => $product->id],
            ]);
        }

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
        $product        = Product::find($id);
        $mainCategories = Category::all();
        $subCategories  = SubCategory::all();
        $images         = ProductImage::all();
        return view('admin.product.editProduct', compact('product', 'mainCategories', 'subCategories', 'images'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        // dd($request);
        $request->validate([
            'product_name'          => 'required',
            'product_description'   => 'required',
            'product_buying_price'  => 'required|numeric|min:0',
            'product_selling_price' => 'required|numeric|min:0',
            'main_category'         => 'required',
            'sub_category'          => 'required',
            'product_quantity'      => 'required',
        ]);

        $product                  = Product::find($id);
        $product->name            = $request->input('product_name');
        $product->sub_category_id = $request->input('sub_category');
        $product->buying_price    = $request->input('product_buying_price');
        $product->selling_price   = $request->input('product_selling_price');
        $product->quantity        = $request->input('product_quantity');
        $product->description     = $request->input('product_description');
        $product->save();

        $sell_prices           = SellingPrice::where('product_id', $id)->first();
        $sell_prices->end_date = Carbon::now()->format('Y-m-d');
        $sell_prices->save();

        $sell_prices_new                = new SellingPrice();
        $sell_prices_new->selling_price = $request->input('sprice');
        $sell_prices_new->product_id    = $product->id;
        $sell_prices_new->save();

        if ($request->hasFile('product_images')) {
            $product_images = $request->file('product_images');
            foreach ($product_images as $product_image) {
                $extension  = $product_image->extension();
                $randomName = rand() . "." . $extension;
                $product_image->storeAs('/public/img/', $randomName);

                $image             = new ProductImage();
                $image->product_id = $product->id;
                $image->image_name = $randomName;
                // dd($randomName);
                // dd($product_image);
                $product->images()->createMany([
                    ['image_name' => $randomName, 'product_id' => $product->id],
                ]);
            }
        }

        return redirect()->route('product.index')->with('success_message', $request->input('product_name') . ' is Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $product = Product::find($id)->name;
        Product::find($id)->delete();

        return redirect()->back()->with('success_message', $product . ' is deleted successfully!');
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