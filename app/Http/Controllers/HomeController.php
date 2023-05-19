<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Category::all();

        $subcategoryId = $request->input('subcategory');
        $subCategory   = SubCategory::find($subcategoryId);

        $productsQuery = Product::query();
        if ($subCategory) {
            $productsQuery->where('sub_category_id', $subcategoryId);
        }

        $productsQuery->when(request()->search, function ($query) {
            $search = request()->search;
            $query->orWhere("name", "like", "%$search%");
        });

        // Apply sorting based on the selected filter option
        $filterOption = $request->input('filter_option');
        switch ($filterOption) {
            case '1':
                $productsQuery->orderBy('name');
                break;
            case '2':
                $productsQuery->join('selling_prices', 'products.id', '=', 'selling_prices.product_id')
                    ->orderBy('selling_prices.selling_price')
                    ->orderBy('selling_prices.created_at', 'desc')
                    ->select('products.*');
                break;
            case '3':
                $productsQuery->join('selling_prices', 'products.id', '=', 'selling_prices.product_id')
                    ->orderByDesc('selling_prices.selling_price')
                    ->orderBy('selling_prices.created_at', 'desc')
                    ->select('products.*');
                break;
            // For the default option or when no filter option is selected, no additional sorting is applied
            default:
                // Do nothing
                break;
        }

        $products = $productsQuery->latest()->paginate(8);

        return view('products', compact('products', 'categories', 'subCategory'))
            ->with('i', (request()->input('page', 1) - 1) * 8);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $product    = Product::find($id);
        $categories = Category::all();
        $quantity   = 1;

        return view('product', compact('product', 'categories', 'quantity'));
    }

    public function allProducts(Request $request)
    {
        $categories = Category::all();

        $subcategoryId = $request->input('subcategory');
        $subCategory   = SubCategory::find($subcategoryId);

        $productsQuery = Product::query();
        if ($subCategory) {
            $productsQuery->where('sub_category_id', $subcategoryId);
        }

        $products = $productsQuery->when(request()->search, function ($query) {
            $search = request()->search;
            $query->orWhere("name", "like", "%$search%");
        })->latest()->paginate(8);

        return view('products', compact('products', 'categories', 'subCategory'))
            ->with('i', (request()->input('page', 1) - 1) * 8);
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