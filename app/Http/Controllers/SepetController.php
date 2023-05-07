<?php

namespace App\Http\Controllers;

use App\Models\Sepet;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class SepetController extends Controller
{
    public static function add_to(Request $request)
    {
        $itemData = $request->validate([ "product_id" => "required|integer"]);
        $itemData["user_id"] = auth()->user()->id;
        $itemData["product_id"] = $itemData["product_id"] * 1;
        
        Sepet::create($itemData);

        return back();
    }
}
