<?php

namespace App\Http\Controllers;
use App\Mail\OrderPlacement;


use Illuminate\Support\Facades\DB;
use Mail; 
// use Illuminate\Support\Facades\Mail;


use Log;
use App\Order;
use App\Product;
use App\OrderDetail;
use App\Client;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function cart(){
    	return view('front.cart');
    }

    public function checkout(Request $request){
    	$cart = $request->data['cart'];
    	// dd($cart);
    	$client = $request->data['client'];


       DB::beginTransaction();
       try{
    	// dd($cart);
    		$client = Client::create([
    			'name' => $client['name'],
    			'email' => $client['email'],
    			'phone' => $client['phone'],
    			'address' => $client['address'],

    		]);
	    	$order = Order::create([
	    		'invoice_id' => 'INV-'. time(),
	    		'client_id' => $client->id,
	    		'total_ammount' => 0,
	    		'payment_type' => Order::PT_OFFLINE,
	    		'payment_status' => Order::PS_UNPAID,
	    		'status' => Order::STATUS_PENDING,

	    	]);
	    	// dd($order->id);
	    	$total_ammount = 0;
	    	foreach ($cart as $item) {
	    	// dd($item);
	    		$product = Product::with('category')->where('id', $item['productID'])->first();
	    	// dd($product);

	    		$order_details['order_id'] = $order->id;
	    		$order_details['category_id'] = $product->category->id;
	    		$order_details['category_name'] = $product->category->name; 
	    		$order_details['product_id'] = $product->id; 
	    		$order_details['product_name'] = $product->name;
	    		$order_details['quantity'] = $item['productQuantity'];
	    		$order_details['unit_price'] = $product->unit_price; 
	    		$order_details['subtotal'] = $product->unit_price*$item['productQuantity'];
	    		OrderDetail::create($order_details);
	    		$total_ammount += $order_details['subtotal'];
	    		$product->stock = $product->stock - $item['productQuantity'];
	    		$product->save();

	    	}
	    	$order->total_ammount = $total_ammount;
	    	$order->save();

	    	DB::commit();

	    	// Mail::to($client->email)->send(new OrderPlacement());
	    	return json_encode(['order_id'=>$order->id]);
    	}catch(\Exception $exception){
	        // dd('error');
	        DB::rollback();
	        Log::error($exception->getMessage());
	        // return false;
	    	return json_encode(['responce'=>false]);

       }
    }	
}
