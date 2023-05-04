<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $paymentMethods = PaymentMethod::all();

        return view('admin.paymentMethod.paymentMethodsList', compact('paymentMethods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $bankNames = ['KBZ', 'AYA', 'AGD','CB', 'A Bank', 'MCB', 'UAB', 'G Bank'];
        return view('admin.paymentMethod.newPaymentMethod', compact('bankNames'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $paymentMethod = new PaymentMethod();
        $paymentMethod->acc_name = $request->input("acc_name");
        $paymentMethod->acc_number = $request->input("acc_no");
        $paymentMethod->acc_type = $request->input("acc_type");
        $paymentMethod->bank_name = $request->input("bank_name");

        $paymentMethod->save();
        return redirect()->route('paymentMethod.index')->with('success_message', $request->input('acc_name') . ' is added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(PaymentMethod $paymentMethod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $paymentMethod = PaymentMethod::find($id);
        $bankNames = ['KBZ', 'AYA', 'AGD','CB', 'A Bank', 'MCB', 'UAB', 'G Bank'];
        return view('admin.paymentMethod.editPaymentMethod', compact('paymentMethod', 'bankNames'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $paymentMethod = PaymentMethod::find($id);
        $paymentMethod->acc_name = $request->input("acc_name");
        $paymentMethod->acc_number = $request->input("acc_no");
        $paymentMethod->acc_type = $request->input("acc_type");
        $paymentMethod->bank_name = $request->input("bank_name");

        $paymentMethod->save();
        return redirect()->route('paymentMethod.index')->with('success_message', $request->input('acc_name') . ' is Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $paymentMethod = PaymentMethod::find($id)->name;
        PaymentMethod::find($id)->delete();

        return redirect()->back()->with('success_message', $paymentMethod . ' is deleted successfully!');
    }
}
