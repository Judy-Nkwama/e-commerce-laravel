<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Http\Request;
//use Illuminate\Foundation\Auth\User;

class UserController extends Controller
{
    // Show the signup form
    public static function index(){
        return view("signup");
    }

    // yeni kullanınıcı oluşturma
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

    // Show the login form
    public static function login(){
        return view("login");
    }

    // Show the login form
    public static function auth(Request $request){
        
        $userData = $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        // if auth passes
        if(auth()->attempt($userData)){
            $request->session()->regenerate();

            if(auth()->user()->is_admin){
                return redirect("/dashboard");
            }

            return redirect("/");
        }

        // if auth fails
        return back()->withErrors(["auth_failure" => "E-posta veya şifre hatalı!"]);
    }

    // çıkış işlemi
    public static function logout(Request $request){
        
        auth()->logout();

        // mevcut oturum bilgileri yenilleme  
        $request->session()->invalidate();
        $request->session()->regenerateToken(); 

        return redirect("/");
    }

}
