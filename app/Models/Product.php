<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public static $rules = [
        'name' => 'required|string',
        'description' => 'nullable|string',
        'amount' => 'required|integer',
        'value' => 'required|numeric',
        'category_id' => 'required|integer'
    ];
    public $fillable = ['name', 'description', 'amount', 'photo', 'value', 'category_id'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function orders(){
        return $this->belongsToMany('App\Models\Order')->withPivot('amount');
    }
}
