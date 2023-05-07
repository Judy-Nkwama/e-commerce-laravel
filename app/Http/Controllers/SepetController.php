<?php

namespace App\Http\Controllers;

use App\Models\Sepet;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class SepetController extends Controller
{
    public static function add_to(Request $request)
    {

        $itemData = $request->validate(["product_id" => "required|integer"]);
        $itemData["user_id"] = auth()->user()->id;
        $itemData["product_id"] = $itemData["product_id"] * 1;

        $item = null;
        $cart_items = auth()->user()->sepet()->get();
        $len = count($cart_items);
        for ($i = 0; $i < $len; $i++) {
            if ($cart_items[$i]->product_id == $itemData["product_id"]) {
                $item = $cart_items[$i];
                break;
            }
        }

        if($item){
            $item->delete();
        }else{
            Sepet::create($itemData);
        }
        return back();
    }
}
