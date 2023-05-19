<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $subCategory = SubCategory::find($id);
        $categories  = Category::all();
        return view('admin.category.editSubCategory', compact('subCategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'category_name' => 'required',
            'description'   => 'required',
            'insert_option' => 'required'
        ]);

        $subCategory              = SubCategory::find($id);
        $subCategory->name        = $request->input('category_name');
        $subCategory->description = $request->input('description');
        $subCategory->category_id = $request->input('insert_option');

        $subCategory->save();

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the subcategory
        $subcategory = SubCategory::findOrFail($id);

        // Find and delete the associated product images
        $products = $subcategory->products;
        foreach ($products as $product) {
            $product->images()->delete();
        }

        // Delete the subcategory
        $subcategory->delete();

        return redirect()->back();
    }
}