<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public static function index(){
        return view("products.index", [
            "products" => Products::latest()->filter(request(["tag"]))->get()
        ]);
    }

    public static function show($id){
        return view("products.show", [
            "product" => Products::find($id)
        ]);
    }
}
