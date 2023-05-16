<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $subCategories = SubCategory::all();
        $categories = Category::all();

        return view('admin.category.categoryList', compact('subCategories', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        // $isNewCategory = true;
        return view('admin.category.newCategory', compact('categories'));
        // return view('admin.category.category', compact('categories', 'isNewCategory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'category_name' => 'required',
        ]);

        $insertOption = $request->input('insert_option');
        // dd($insertOption);

        if ($insertOption === null) {
            $category              = new Category();
            $category->name        = $request->input('category_name');
            $category->save();
        } else {
            $subCategory              = new SubCategory();
            $subCategory->name        = $request->input('category_name');
            $subCategory->category_id = $insertOption;

            $subCategory->save();
        }

        // return view('admin.newCategory')->with([
        //     'message'=>'Data added successfully!',
        //     "categories"=>Category::all() ]);
        return redirect()->route('category.index')->with('success_message', $request->input('category_name') . ' is added successfully!');
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
        $category = Category::find($id);
        return view('admin.category.editCategory', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'category_name' => 'required',
        ]);

        $category              = Category::find($id);
        $category->name        = $request->input('category_name');
        $category->save();

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $category = Category::find($id)->name;
        Category::find($id)->delete();

        return redirect()->back()->with('success_message', $category . ' is deleted successfully!');
    }
}
