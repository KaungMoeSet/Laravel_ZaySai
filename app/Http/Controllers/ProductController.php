<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //all products
    public function index() {
        return view('products');
    }
    //single product
    public function show() {
        return view('');
    }
}
