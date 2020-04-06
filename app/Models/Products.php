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
    public function info_product()
    {
        return $this->hasOne('App\Info_product', 'info_product_id', 'id');
    }
}
