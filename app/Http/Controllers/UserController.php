<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Http\Request;
//use Illuminate\Foundation\Auth\User;

class UserController extends Controller
{
    public static function index(){
        return view("signup");
    }

    public static function store(Request $request){

        $userData = $request->validate([
            "firstname" => "required|min:2",
            "lastname" => "required|min:2",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:4"
        ]);
        
        $userData["password"] = bcrypt($userData["password"]);
        $postedUser = User::create($userData);

        $addressData = $request->validate([
            "address" => "required",
            "city" => "required",
            "zip" => "required"
        ]);

        $addressData["user_id"] = $postedUser["id"];
        
        UserAddress::create($addressData);
        
        
        auth()->login($postedUser);

        return redirect("/");
        
    }

}
