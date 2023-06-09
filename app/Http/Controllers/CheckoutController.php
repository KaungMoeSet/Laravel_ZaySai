<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Product;
use regions;
use App\Models\City;
use App\Models\Region;
use App\Models\Category;
use App\Models\DeliveryFees;
use App\Models\Township;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $cart       = $request->session()->get('cart', []);
        $user       = Auth::user();
        $categories = Category::all();
        $regions    = Region::all();

        $cart_data = [];

        foreach ($cart as $id => $item) {
            $product = Product::find($item['product_id']);
            if ($product) {
                $product->quantity = $item['quantity'];
                $cart_data[]       = $product;
            }
        }

        return view('customer.checkout', compact('cart_data', 'categories', 'user', 'regions'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Request $request)
    {
        $cart = session()->get('cart', []);
        $cart = [];
        session()->put('cart', $cart);
        
        $cart_data[] = Product::find($id);
        $user        = Auth::user();
        $categories  = Category::all();
        $regions     = Region::all();

        $quantity = $request->input('quantity', 1); // get the quantity from the request, default to 1 if not provided
        if ($quantity > 10) {
            return redirect()->back()->with('error', 'Sorry, you can only add up to 10 units of this product to your cart.');
        }

        $cart[$id] = [
            'product_id' => $id,
            'quantity'   => $quantity,
        ];

        $cart_data[0]->quantity = $quantity;
        session()->put('cart', $cart);

        return view('customer.checkout', compact('cart_data', 'categories', 'user', 'regions', 'quantity'));
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
        $cart = session('cart');

        // Remove the item with the given id from the cart
        unset($cart[$id]);

        // Save the updated cart back to the session
        session(['cart' => $cart]);

        return redirect()->back();
    }

    public function getCitiesByRegion(Request $request, $regionId)
    {
        $cities = City::where('region_id', $regionId)->get();

        return response()->json($cities);
    }

    public function getTownships(Request $request, $cityId)
    {
        $townships = Township::where('city_id', $cityId)->get();

        return response()->json($townships);
    }

    public function updateShippingAddress(Request $request)
    {
        $user = Auth::user();

        // Get the selected address
        $selectedAddress = $user->addresses->find($request->input('shipping_address_id'));

        // Set the default address for the user
        foreach ($user->addresses as $address) {
            if ($address->id == $selectedAddress->id) {
                $address->setDefault = true;
            } else {
                $address->setDefault = false;
            }
            $address->save();
        }

        return redirect()->back()->with('success_message', 'Shipping address updated successfully');
    }
}
