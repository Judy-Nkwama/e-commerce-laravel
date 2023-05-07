<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Product;
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

    // create product
    public static function create(Request $request)
    {
        if (!(auth()->user()->is_admin ?? false)) abort(401);

        $offerData = $request->validate(
            [
                "title" => "required|min:2",
                "description" => "required|min:2",
                "tags_string" => "required",
                "price" => "required|numeric",
                "quantity" => "required|integer",
                "bg_image_link" => "required"
            ]
        );

        if ($request->hasFile('bg_image_link')) {
            $offerData['bg_image_link'] = $request->file('bg_image_link')->store('products_image', "public");
        }

        Products::create($offerData);
        return redirect("/dashboard/products");
        
    }
}
