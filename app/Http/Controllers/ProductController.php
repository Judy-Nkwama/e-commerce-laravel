<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public static function index()
    {
        return view("products.index", [
            "products" => Products::latest()->filter(request(["tag", "s"]))->get()
        ]);
    }

    public static function show($id)
    {
        $product = Products::find($id);
        
        $product["similar_products"] = Products::latest()->filter([
            "tags_string" => $product->tags_string,
            "product_id" => $product->id,
        ])->get();

        return view("products.show", [
            "product" => $product
        ]);
    }
}
