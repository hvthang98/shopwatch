<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table='products';
    public function brands()
    {
        return $this->hasOne('App\Brands', 'brands_id', 'id');
    }
}
