<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table='products';
    public $timestamps = false; 
    public function brands()
    {
        return $this->hasOne('App\Models\Brands', 'id', 'brands_id');
    }
    public function imgProduct()
    {
        return $this->hasMany('App\Models\ImgProduct', 'products_id', 'id');
    }

    public function inforProduct()
    {
        return $this->hasOne('App\Models\Info_product',  'products_id','id');
    }
}
