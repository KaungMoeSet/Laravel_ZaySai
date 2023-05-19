<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\PaymentConfirm;
use Illuminate\Support\Facades\Auth;

class PaymentConfirmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $paymentConfirms = PaymentConfirm::all();

        return view('admin.order.paymentConfirm', compact('paymentConfirms'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $paymentConfirm = PaymentConfirm::find($id);

        return view('admin.order.paymentConfirmDetail', compact('paymentConfirm'));
    }

    public function accept(string $id)
    {
        $now = Carbon::now('Asia/Yangon')->format('Y/m/d H:i:s');

        $paymentConfirm = PaymentConfirm::find($id);

        $paymentConfirm->confirm_status = 'accepted';
        $paymentConfirm->confirm_cancel_date = $now;
        $paymentConfirm->reject_reason = '';

        $order = Order::find($paymentConfirm->payment->order->id);
        $order->order_status = 'processing';
        $order->save();

        $paymentConfirm->admin_id = Auth::guard('admin')->user()->id;
        $paymentConfirm->save();

        return redirect()->route('paymentConfirm.index')->with('success_message', 'Payment accepted successfully!');
    }

    public function reject(string $id)
    {
        $now = Carbon::now('Asia/Yangon')->format('Y/m/d H:i:s');

        $paymentConfirm = PaymentConfirm::find($id);

        $paymentConfirm->confirm_status = 'rejected';
        $paymentConfirm->confirm_cancel_date = $now;
        $paymentConfirm->reject_reason = 'your information is wrong';

        $order = Order::find($paymentConfirm->payment->order->id);
        $order->order_status = 'rejected';
        $order->save();

        $paymentConfirm->admin_id = Auth::guard('admin')->user()->id;

        $paymentConfirm->save();

        return redirect()->route('paymentConfirm.index')->with('success_message', 'Payment rejected!');
    }
}
