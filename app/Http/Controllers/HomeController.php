<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Users;

class HomeController extends Controller
{
    public function home(){
        $products = Product::all();
        return view('front.home', compact('products'));
    }

    public function products(){
        $products = Product::all();
        return view('front.product', compact('products'));;
    }

    public function recomendation(){
        return view('front.recomendation');
    }

    public function resultrecomendation(){
        $products = Product::all();
        return view('front.recomendation_result',compact('products'));
    }

    public function login()
    {
        return view('back.login');
    }

    public function loginprocess(Request $request)
    {
        // dd($request->all());
        $username = $request->username;
        $password = $request->password;

        // dd($username, $password);

        return view('back.dashboard');
    }
}
