<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\HeroCarousel;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heroCarousel = HeroCarousel::all();
        $products   = Product::all();
        $categories = Category::all();
        $forYouProducts = Product::inRandomOrder()->limit(20)->get();

        return view('products', compact('products', 'categories', 'heroCarousel', 'forYouProducts'));
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

    public function allProducts(Request $request)
    {
        $categories = Category::all();

        $subcategoryId = $request->input('subcategory');
        $subCategory = SubCategory::find($subcategoryId);

        $productsQuery = Product::query();
        if ($subCategory) {
            $productsQuery->where('sub_category_id', $subcategoryId);
        }

        $products = Product::when(request()->search, function ($query) {
            $search = request()->search;
            $query->orWhere("name", "like", "%$search%");
        })->latest()->paginate(2);
        // $products = $productsQuery->latest()->paginate(2);


        return view('products', compact('products', 'categories', 'subCategory'))
            ->with('i', (request()->input('page', 1) - 1) * 2);
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
