<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $cart = $request->session()->get('cart', []);

        if (empty($cart)) {
            // return redirect()->route('products.index')->with('status', 'No items in your cart!!');
        }

        $cart_data = [];

        foreach ($cart as $id => $item) {
            $product = Product::find($item['product_id']);
            if ($product) {
                $product->quantity = $item['quantity'];
                $cart_data[]       = $product;
            }
        }

        $categories = Category::all();

        return view('customer.cart', compact('cart_data', 'categories'));
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
    public function update(Request $request, string $id, int $quantity)
    {
        $cart = $request->session()->get('cart', []);

        if ($quantity <= 0) {
            unset($cart[$id]);
        } else {
            $product = Product::find($id);
            if ($product) {
                $cart[$id] = [
                    'product_id' => $product->id,
                    'quantity'   => $quantity,
                ];
            }
        }

        $request->session()->put('cart', $cart);

        return redirect()->route('cart.index');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function add(Request $request, string $id)
    {
        $quantity = $request->input('quantity', 1);

        $this->addToCart($id, $quantity);

        return redirect()->back();
    }

    public function addToCart(string $id, int $quantity = 1)
    {
        $cart = Session::get('cart', []);

        $product = Product::find($id);

        if ($product) {
            if (isset($cart[$id])) {
                $cart[$id]['quantity']++;
            } else {
                $cart[$id] = [
                    'product_id' => $id,
                    'quantity'   => $quantity,
                ];
            }

            Session::put('cart', $cart);
        } else {
            // Handle the case where the product is not found
            abort(404);
        }
    }
}