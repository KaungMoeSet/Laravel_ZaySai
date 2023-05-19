<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\DeliveryFees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $user = Auth::user();

        $request->validate([
            'name'         => 'required',
            'phoneNumber'  => 'required',
            'building'     => 'required',
            'region'       => 'required',
            'city'         => 'required',
            'full_address' => 'required',
        ]);

        $address              = new Address();
        $address->name        = $request->input('name');
        $address->phoneNumber = $request->input('phoneNumber');
        $address->building    = $request->input('building');
        $address->landmark    = $request->input('landmark');
        $address->address     = $request->input('full_address');
        $address->user_id     = $user->id;

        $existingAddresses = $user->addresses;
        if ($existingAddresses->isEmpty()) {
            $address->setDefault = true;
        } else {
            $address->setDefault = false;
        }

        $address->township_id = $request->input('township');
        $address->city_id     = $request->input('city');
        $address->save();

        return redirect()->back()->with('success_message', 'Address is added successfully!');
    }
}
