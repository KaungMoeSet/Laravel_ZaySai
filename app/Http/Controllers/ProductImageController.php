<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductImageController extends Controller
{
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $productImage = ProductImage::find($id)->image_name;
        // dd($productImage);
        ProductImage::find($id)->delete();

        $path = "public/img/{$productImage}";
        if(Storage::exists($path)) {
            Storage::delete($path);
        }

        return redirect()->back()->with('success_message', $productImage . ' is deleted successfully!');
    }
}
