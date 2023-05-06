<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Show HomePage
    public static function index()
    {
        if (!(auth()->user()->is_admin ?? false)) return redirect("/");
        return view("dashboard");
    }

    // Show Products
    public static function show_products()
    {
        if (!(auth()->user()->is_admin ?? false)) return redirect("/");
        return view(
            "admin.products",[
                "products" => Products::latest()->get()
            ]
        );
    }

    // create product
    public static function add_product()
    {
        if (!(auth()->user()->is_admin ?? false)) return redirect("/");
        return view("admin.new-product");
    }

    //Show orders
    public static function show_orders()
    {
        if (!(auth()->user()->is_admin ?? false)) return redirect("/");
        return view("admin.orders");
    }

    //Show users
    public static function show_users()
    {
        if (!(auth()->user()->is_admin ?? false)) return redirect("/");
        return view("admin.users");
    }

    //Show earnings
    public static function show_earnings()
    {
        if (!(auth()->user()->is_admin ?? false)) return redirect("/");
        return view("admin.earnings");
    }
}
