<?php

namespace App\Http\Controllers;

use App\Models\HeroCarousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroCarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $heroes = HeroCarousel::all();

        return view('admin.hero.heroList', compact('heroes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.hero.newHero');
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
            'photo'       => 'required'
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

        $hero = new HeroCarousel();
        $hero->title = $request->input('title');
        $hero->description = $request->input('description');
        $hero->image = $randomName;
        $hero->save();

        return redirect()->route('heroCarousel.index')->with('success_message', $request->input('title') . ' is added successfully!');
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
    public function edit(string $id)
    {
        //
        $hero = HeroCarousel::find($id);
        return view('admin.hero.editHero', compact('hero'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'description' => 'required',
        ]);

        $hero = HeroCarousel::find($id);

        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $validated = $request->validate([
                    'image' => 'mimes:jpg,jpeg,png,gif|max:2048',
                ]);
                $extension = $request->image->extension();
                $randomName = rand() . "." . $extension;
                $request->image->storeAs('/public/img/', $randomName);

                $path = "public/img/{$hero->image}";
                if (Storage::exists($path)) {
                    Storage::delete($path);
                }

                $hero->image = $randomName;
            }
        } else {
            $hero->image = $hero->image;
        }

        $hero->title = $request->input('title');
        $hero->description = $request->input('description');
        $hero->save();

        return redirect()->route('heroCarousel.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $hero = HeroCarousel::find($id);
        $heroTitle = $hero->title;
        $heroImage = $hero->image;
        // dd($productImage);

        $path = "public/img/{$heroImage}";
        if(Storage::exists($path)) {
            Storage::delete($path);
        }

        HeroCarousel::find($id)->delete();

        return redirect()->back()->with('success_message', $heroTitle . ' is deleted successfully!');
    }
}
