<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    protected $table='brands';
    public function product()
    {
        return $this->hasMany('App\Products', 'brands_id', 'id');
    }
    public function info_product()
    {
        return $this->hasMany('App\Info_product', 'brands_id', 'id');
    }
}
