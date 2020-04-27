<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    public function index(Request $request){
    	// dd($request->all());
    	$order = Order::with(['client']);
    	if (isset($request->search) && $request->search != null ) {
    		$order = $order->where('invoice_id','like','%'.$request->search.'%');
    		$order = $order->orWhere('total_ammount','like','%'.$request->search.'%');
    		$order = $order->orWhere('payment_status','like','%'.$request->search.'%');

    	}
    	$order = $order->orderBy('id','desc')->paginate('10');
    	if (isset($request->search) && $request->search != null ) {
    		$render['search'] = $request->search;
    		$order = $order->appends($render);
    	}
    	$data['orders'] = $order;
    	// dd($data);
    	return view('admin.order.index',$data);
    }
}
