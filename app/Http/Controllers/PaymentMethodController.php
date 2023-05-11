<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $payNames = ['KBZ', 'AYA', 'AGD','CB', 'A Bank', 'MCB', 'UAB', 'G Bank', 'Wave Pay'];
        return view('admin.paymentMethod.newPaymentMethod', compact('payNames'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'acc_name'  => 'required',
            'acc_no'    => 'required',
            'acc_type'  => 'required',
            'bank_name' => 'required',
            'logo'     => 'required'
        ]);

        if ($request->hasFile('logo')) {
            if ($request->file('logo')->isValid()) {
                $validated  = $request->validate([
                    'logo' => 'mimes:jpg,jpeg,png,gif|max:2048',
                ]);
                $extension  = $request->logo->extension();
                $randomName = rand() . "." . $extension;
                $request->logo->storeAs('/public/img/', $randomName);
            }
        }

        $paymentMethod = new PaymentMethod();
        $paymentMethod->acc_name = $request->input('acc_name');
        $paymentMethod->acc_number = $request->input('acc_no');
        $paymentMethod->acc_type = $request->input('acc_type');
        $paymentMethod->bank_name = $request->input('bank_name');
        $paymentMethod->image = $randomName;

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
        $payNames = ['KBZ', 'AYA', 'AGD','CB', 'A Bank', 'MCB', 'UAB', 'G Bank', 'Wave Pay'];
        return view('admin.paymentMethod.editPaymentMethod', compact('paymentMethod', 'payNames'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'acc_name'  => 'required',
            'acc_no'    => 'required',
            'acc_type'  => 'required',
            'bank_name' => 'required',
            'logo'     => 'required'
        ]);
        
        $paymentMethod = PaymentMethod::find($id);

        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $validated = $request->validate([
                    'image' => 'mimes:jpg,jpeg,png,gif|max:2048',
                ]);
                $extension = $request->image->extension();
                $randomName = rand() . "." . $extension;
                $request->image->storeAs('/public/img/', $randomName);

                $path = "public/img/{$paymentMethod->image}";
                if (Storage::exists($path)) {
                    Storage::delete($path);
                }

                $paymentMethod->image = $randomName;
            }
        } else {
            $paymentMethod->image = $paymentMethod->image;
        }

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
        $paymentMethod = PaymentMethod::find($id);
        $paymentMethodName = $paymentMethod->name;
        $paymentMethodLogo = $paymentMethod->image;

        $path = "public/img/{$paymentMethodLogo}";
        if(Storage::exists($path)) {
            Storage::delete($path);
        }

        PaymentMethod::find($id)->delete();

        return redirect()->back()->with('success_message', $paymentMethodName . ' is deleted successfully!');
    }
}
