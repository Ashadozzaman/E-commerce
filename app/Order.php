<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Client;
use App\OrderDetail;


class Order extends Model
{
	protected $fillable = [
		'invoice_id','total_ammount','payment_type','payment_status','status','processed_by','client_id'
	];
    // pt =payment type
    const PT_OFFLINE = 'offline';
    const PT_ONLINE = 'online';

    // ps =payment status
    const PS_PAID = 'paid';
    const PS_UNPAID = 'unpaid';

    // ps =payment....
    const STATUS_PENDING = 'pending';
    const STATUS_PROCESSING = 'processing';
    const STATUS_DELIVERED = 'delivered';
    const STATUS_DECLINED = 'declined';


    public function client(){
        return $this->belongsTo(Client::class);
    }
    public function orderDetails(){
        return $this->hasMany(OrderDetail::class);
    }


}
