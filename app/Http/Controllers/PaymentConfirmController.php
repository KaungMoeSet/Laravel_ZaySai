<?php

namespace App\Http\Controllers;

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
        $paymentConfirm = PaymentConfirm::find($id);

        return view('admin.order.paymentConfirmDetail', compact('paymentConfirm'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaymentConfirm $paymentConfirm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PaymentConfirm $paymentConfirm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaymentConfirm $paymentConfirm)
    {
        //
    }

    public function accept(string $id)
    {
        $now = Carbon::now('Asia/Yangon');

        $paymentConfirm = PaymentConfirm::find($id);

        $paymentConfirm->confirm_status = 'accepted';
        $paymentConfirm->confirm_cancel_date = $now;
        $paymentConfirm->reject_reason = '';

        $paymentConfirm->admin_id = Auth::guard('admin')->user()->id;

        $paymentConfirm->save();

        return redirect()->route('paymentConfirm.index')->with('success_message', 'Payment accepted successfully!');
    }

    public function reject(string $id)
    {
        $now = Carbon::now('Asia/Yangon');

        $paymentConfirm = PaymentConfirm::find($id);

        $paymentConfirm->confirm_status = 'rejected';
        $paymentConfirm->confirm_cancel_date = $now;
        $paymentConfirm->reject_reason = 'သင့်ရဲ့ အချက်အလက်မှားယွင်းနေပါတယ်';

        $paymentConfirm->admin_id = Auth::guard('admin')->user()->id;

        $paymentConfirm->save();

        return redirect()->route('paymentConfirm.index')->with('success_message', 'Payment rejected!');
    }
}
