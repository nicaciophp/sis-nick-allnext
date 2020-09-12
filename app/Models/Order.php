<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public static $rules = [
        'order_status' => 'required|integer',
        'costumer_id' => 'required|integer',
        'amount.*' => 'required|integer',
        'product_id.*' => 'required|integer'
    ];
    public $fillable = ['order_status', 'costumer_id'];

    public function products(){
        return $this->belongsToMany('App\Models\Product', 'order_product')->withPivot(['amount']);
    }
    public function costumer(){
        return $this->belongsTo('App\Models\Costumer');
    }
}
