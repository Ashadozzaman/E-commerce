<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   protected $fillable = [
        'name', 'description', 'status',
    ];

    public function product(){
    	return $this->hasMany(Product::class);
    }

    const ACTIVE_STATUS = 'active';
    const INACTIVE_STATUS = 'inactive';

    public function scopeActive($query){
    	return $query->where('status',Category::ACTIVE_STATUS);
    }
}