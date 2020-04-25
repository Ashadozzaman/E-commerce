<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function cart(){
    	return view('front.cart');
    }

    public function checkout(Request $request){
    	$cart = $request->data;
    	
    	dd($cart);
    }
}
