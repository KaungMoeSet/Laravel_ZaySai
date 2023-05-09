<?php

namespace App\Http\Controllers;

use regions;
use App\Models\City;
use App\Models\Region;
use App\Models\Category;
use App\Models\Township;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
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
        $user       = Auth::user();
        $categories = Category::all();
        $regions    = Region::all();

        return view('customer.checkout', compact('categories', 'user', 'regions'));
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
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
}