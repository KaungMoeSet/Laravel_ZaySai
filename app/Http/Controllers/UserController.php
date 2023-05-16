<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Region;
use App\Models\User;
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
        //
        $user = User::find($id)->name;
        User::find($id)->delete();
        return redirect()->back()->with('success_message', $user . ' is deleted successfully!');
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

    public function getAllOrders()
    {
        $user = Auth::user();
        $categories = Category::all();

        return view('customer.allOrders', compact('categories', 'user'));
    }
}