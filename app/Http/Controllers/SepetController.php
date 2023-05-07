<?php

namespace App\Http\Controllers;

use App\Models\Sepet;
use Illuminate\Http\Request;

class SepetController extends Controller
{
    public static function add_to(Request $request)
    {
        $itemData = $request->validate([ "product_id" => "required|integer"]);
        $itemData["user_id"] = auth()->user()->id;
        
        Sepet::create($itemData);

        return back();
    }
}
