<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public static function index(){
        return view("products.index", [
            "products" => Products::all()
        ]);
    }

    public static function show($id){
        return view("products.show", [
            "product" => Products::find($id)
        ]);
    }
}
