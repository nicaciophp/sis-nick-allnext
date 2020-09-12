<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Costumer extends Model
{
    public $fillable = ['name', 'telephone', 'cpf', 'email'];

    public function order(){
        return $this->hasMany('App\Models\Order');
    }
}
