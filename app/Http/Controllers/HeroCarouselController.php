<?php

namespace App\Http\Controllers;

use App\Models\HeroCarousel;
use Illuminate\Http\Request;

class HeroCarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $heroes = HeroCarousel::all();

        return view('admin.Hero.heroList', compact('heroes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.Hero.newHero');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'description' => 'required',
            'link'        => 'required',
        ]);

        if ($request->hasFile('photo')) {
            if ($request->file('photo')->isValid()) {
                $validated  = $request->validate([
                    'photo' => 'mimes:jpg,jpeg,png,gif|max:2048',
                ]);
                $extension  = $request->photo->extension();
                $randomName = rand() . "." . $extension;
                $request->photo->storeAs('/public/img/', $randomName);

            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(HeroCarousel $heroCarousel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HeroCarousel $heroCarousel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HeroCarousel $heroCarousel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HeroCarousel $heroCarousel)
    {
        //
    }
}