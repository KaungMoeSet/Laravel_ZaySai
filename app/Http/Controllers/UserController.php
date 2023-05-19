<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Region;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::all();

        return view('admin.account.userAccountlist', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $user       = User::find($id);
        $categories = Category::all();

        return view('customer.editProfile', compact('categories', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $user           = User::find($id);
        $user->name     = $request->input('userName');
        $user->birthday = $request->input('birthday');
        $user->gender   = $request->input('gender');
        $user->save();

        return redirect()->route('profile.profileData');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the user
        $user = User::findOrFail($id);

        // Find and delete the associated orders
        $user->orders()->delete();

        // Delete the user
        $user->delete();

        return redirect()->back()->with('success_message', $user->name . ' is deleted successfully!');
    }

    public function showMyProfile()
    {
        $categories = Category::all();
        $user       = Auth::user();

        return view('customer.myProfile', compact('categories', 'user'));
    }

    public function profileData()
    {
        $categories = Category::all();
        $user       = Auth::user();

        return view('customer.profileData', compact('categories', 'user'));
    }

    public function addressBook()
    {
        $categories = Category::all();
        $user       = Auth::user();
        $regions    = Region::all();

        return view('customer.addressBook', compact('categories', 'user', 'regions'));
    }

    public function getAllOrders(Request $request)
    {
        $user         = Auth::user();
        $categories   = Category::all();
        $filterOption = $request->input('filter_option', '0'); // Get the selected filter option, default to 0

        $orders = $user->orders;

        switch ($filterOption) {
            case '1':
                $orders = $orders->where('order_date', '>=', now()->subDays(15))->sortByDesc('order_date');
                break;
            case '2':
                $orders = $orders->where('order_date', '>=', now()->subMonths(6))->sortByDesc('order_date');
                break;
            case '3':
                $orders = $orders->filter(function ($order) {
                    return Carbon::parse($order->order_date)->year == Carbon::now()->year;
                })->sortByDesc('order_date');
                break;
            default:
                $orders = $orders->sortByDesc('order_date')->take(5);
                // dd($orders);
                break;
        }

        return view('customer.allOrders', compact('categories', 'user', 'orders', 'filterOption'));
    }

}