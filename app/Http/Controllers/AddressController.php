<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
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
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        $user = Auth::user();

        $request->validate([
            'name'        => 'required',
            'phoneNumber' => 'required',
            'building'    => 'required',
            'region'      => 'required',
            'city'        => 'required',
            'full_address'     => 'required',
        ]);

        $address              = new Address();
        $address->name        = $request->input('name');
        $address->phoneNumber = $request->input('phoneNumber');
        $address->building    = $request->input('building');
        $address->landmark    = $request->input('landmark');
        $address->address     = $request->input('full_address');
        $address->user_id     = $user->id;

        // dd($address);
        $address->township_id = $request->input('township');
        $address->save();

        return redirect()->route('checkout.create')->with('success_message', 'Address is added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Address $address)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address)
    {
        //
    }
}
