<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;
class OrderDetail extends Model
{
    protected $fillable = [
    	'order_id',
    	'category_id',
    	'category_name',
    	'product_id',
    	'product_name',
    	'quantity',
    	'unit_price',
    	'subtotal',
    ];

    public function orders(){
    return $this->belongsTo(Order::class);
    }
}
