<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
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
        $paymentMethods = PaymentMethod::all();
        $cart           = session()->get('cart', []);
        $user           = Auth::user();
        $defaultAddress = $user->addresses->where('setDefault', true)->first();

        $cart_data = [];
        $delifee   = session('cart.delifee');

        foreach ($cart as $id => $item) {
            $product = Product::find($item['product_id']);
            if ($product) {
                $product->quantity = $item['quantity'];
                $cart_data[]       = $product;
            }
        }

        $categories = Category::all();

        return view('customer.order', compact('categories', 'paymentMethods', 'cart_data', 'defaultAddress', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        $cart = session()->get('cart', []);
        $user = Auth::user();

        $request->validate([
            'account'           => 'required',
            'paymentScreenshot' => 'required',
        ]);

        if ($request->hasFile('paymentScreenshot') && $request->file('paymentScreenshot')->isValid()) {
            $validated  = $request->validate([
                'paymentScreenshot' => 'mimes:jpg,jpeg,png,gif|max:2048',
            ]);
            $extension  = $request->paymentScreenshot->extension();
            $randomName = rand() . "." . $extension;
            $request->paymentScreenshot->storeAs('/public/img/', $randomName);
        }

        $order              = new Order();
        $order->customer_id = $user->id;
        // $orderNumber = Hash::make($user->id . $product->id . Carbon::now());

        $payment            = new Payment();
        $payment->account = $request->input('account');
        $payment->payment_screenshot = $randomName;
        $payment->save();


        

        $categories = Category::all();

        return view('customer.orderConfirmed', compact('categories'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}