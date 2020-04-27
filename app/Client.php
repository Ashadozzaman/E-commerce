<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;
class Client extends Model
{
    protected $fillable = [
    	'name','email','phone','address'
    ];

    public function order(){
        return $this->hasMany(Order::class);
    }
}
