<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    //
    public function create($name)
    {
        $subCategory = new SubCategory();

        $subCategory->name = $name;
        $subCategory->save();

        return $subCategory->id;
    }
}
