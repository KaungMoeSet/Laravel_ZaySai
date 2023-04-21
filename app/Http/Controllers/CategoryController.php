<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function create($name)
    {
        $category = new Category();

        $category->name = $name;
        $category->save();

        return $category->id;
    }
}