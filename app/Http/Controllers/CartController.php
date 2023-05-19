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
                $maxQuantity = min(10, $product->quantity); // maximum quantity allowed in cart
                $newQuantity = min($quantity, $maxQuantity); // new quantity to add to cart

                if (isset($cart[$id])) {
                    // If the product is already in the cart, update the quantity
                    $cart[$id]['quantity'] = $newQuantity;
                } else {
                    // Otherwise, add the product to the cart with the new quantity
                    $cart[$id] = [
                        'product_id' => $product->id,
                        'quantity'   => $newQuantity,
                    ];
                }
            }
        }

        $request->session()->put('cart', $cart);

        return redirect()->route('cart.index');
    }

    public function add(Request $request, string $id)
    {
        $quantity = $request->input('quantity');
        if ($quantity) {
            $this->addToCart($id, $quantity);
        } else {
            $this->addToCart($id, $quantity = 1);
        }

        return redirect()->back();
    }

    public function addToCart(string $id, int $quantity = 1)
    {
        $cart = Session::get('cart', []);

        $product = Product::find($id);

        if ($product) {
            if (isset($cart[$id])) {
                if ($cart[$id]['quantity'] + $quantity <= 10 && $cart[$id]['quantity'] + $quantity <= $product->quantity) {
                    $cart[$id]['quantity'] += $quantity;
                } else {
                    // Handle the case where the maximum quantity has been reached
                    // You can redirect back to the product page with an error message
                    return redirect()->back()->with('error', 'Maximum quantity reached.');
                }
            } else {
                if ($quantity <= 10 && $quantity <= $product->quantity) {
                    $cart[$id] = [
                        'product_id' => $id,
                        'quantity'   => $quantity,
                    ];
                } else {
                    // Handle the case where the maximum quantity has been reached
                    // You can redirect back to the product page with an error message
                    return redirect()->back()->with('error', 'Maximum quantity reached.');
                }
            }

            Session::put('cart', $cart);

            // Redirect to the cart page or back to the product page
            return redirect()->route('cart.index')->with('success', 'Product added to cart.');
        } else {
            // Handle the case where the product is not found
            abort(404);
        }
    }


    public function remove($id)
    {
        $cart = session('cart');

        // Remove the item with the given id from the cart
        unset($cart[$id]);

        // Save the updated cart back to the session
        session(['cart' => $cart]);

        return redirect()->back();
    }

}