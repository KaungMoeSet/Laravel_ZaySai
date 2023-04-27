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
        $insertOption = $request->input('insert_option');
        // dd($insertOption);

        if ($insertOption === null) {
            $category              = new Category();
            $category->name        = $request->input('category_name');
            $category->description = $request->input('description');
            $category->save();
        } else {
            $subCategory              = new SubCategory();
            $subCategory->name        = $request->input('category_name');
            $subCategory->description = $request->input('description');
            $subCategory->category_id = $insertOption;

            $subCategory->save();
        }

        // return view('admin.newCategory')->with([
        //     'message'=>'Data added successfully!',
        //     "categories"=>Category::all() ]);
        return redirect()->back()->with('success_message', $request->input('category_name').' is added successfully!');
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
        // $isNewCategory = false;
        // $ismainCategory = true;
        return view('admin.category.editCategory', compact('category'));
        // return view('admin.category.category', compact('category', 'isNewCategory', 'ismainCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $category              = Category::find($id);
        $category->name        = $request->input('category_name');
        $category->description = $request->input('description');
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

        return redirect()->back()->with('success_message', $category.' is deleted successfully!');
    }
}