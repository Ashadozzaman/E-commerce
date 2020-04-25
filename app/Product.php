<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $fillable = [
        'name', 
        'description',
        'status',
        'vandor_id',
        'category_id',
        'brand',
        'unit_price',
        'stock',

    ];

    const ACTIVE_STATUS = 'active';
    const INACTIVE_STATUS = 'inactive';
    public function scopeActive($query){
        return $query->where('status',Product::ACTIVE_STATUS);
    }

    public function vandor(){
    	return $this->belongsTo(Vandor::class);
    }
    public function category(){
    	return $this->belongsTo(Category::class);
    }
    public function product_images(){
        return $this->hasMany(ProductImage::class);
    }
}
