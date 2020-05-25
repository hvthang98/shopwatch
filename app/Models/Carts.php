<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    protected $table='carts';
    public function products()
    {
        return $this->hasOne('App\Models\Products', 'id', 'products_id');
    }
}
