<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Info_product extends Model
{
    protected $table='info_product';
    public function brands()
    {
        return $this->hasOne('App\Brands', 'brands_id', 'id');
    }
    public function products()
    {
        return $this->hasOne('App\Products', 'info_product_id', 'id');
    }
}
