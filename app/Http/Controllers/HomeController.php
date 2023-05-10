<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products   = Product::all();
        $categories = Category::all();

        return view('index', compact('products', 'categories'));
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
    public function show(string $id)
    {
        //
        $product = Product::find($id);
        $categories = Category::all();
        $quantity = 1;

        return view('product', compact('product', 'categories', 'quantity'));
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

    public function allProducts()
    {
        $products   = Product::paginate(10);
        $categories = Category::all();

        return view('products', compact('products', 'categories'));
    }

    public function showAboutUsPage()
    {
        $categories = Category::all();

        return view('pages.aboutUs', compact('categories'));
    }

    public function showContactUsPage()
    {
        $categories = Category::all();

        return view('pages.contactUs', compact('categories'));
    }
}
