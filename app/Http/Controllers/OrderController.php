<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Models\PaymentConfirm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $orders = Order::whereHas('payment.paymentConfirm', function ($query) {
            $query->where('confirm_status', 'accepted');
        })->get();

        return view('admin.order.orderList', compact('orders'));
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
        // $delifee   = session('cart.delifee');

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
        $orderNumber = '#' . date('Y') . $user->id . rand(100000, 999999);
        $order->order_number = $orderNumber;

        // Retrieve default address of user
        $defaultAddress = $user->addresses->where('setDefault', true)->first();

        if ($defaultAddress->township) {
            $deliFee = $defaultAddress->township->deliFees->first()->fee;
        } else {
            $deliFee = 3000;
        }
        // Store default address details in order
        $order->address_id = $defaultAddress->id;
        $order->deli_fee = strval($deliFee);

        $order->save();

        foreach ($cart as $id => $item) {
            $product = Product::find($item['product_id']);
            if ($product) {
                $order->products()->attach($product, ['quantity' => $item['quantity']]);
            }
        }
        // foreach ($cart as $product_id => $quantity) {
        //     $product = Product::find($product_id);
        //     $order->products()->attach($product, ['quantity' => $quantity]);
        // }
        $now = Carbon::now('Asia/Yangon');

        $payment            = new Payment();
        $payment->payment_method_id = $request->input('account');
        $payment->payment_screenshot = $randomName;
        $payment->paid_at = $now;
        $payment->order_id = $order->id;
        $payment->save();

        $payment_confirm = new PaymentConfirm();
        $payment_confirm->payment_id = $payment->id;
        $payment_confirm->total_amount = $request->input('totalAmt');
        $payment_confirm->save();

        $categories = Category::all();
        Session::forget('cart');
        return view('customer.orderConfirmed', compact('categories', 'orderNumber'));
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
