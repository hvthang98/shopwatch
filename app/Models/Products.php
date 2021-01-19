<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $guarded  =[
        'infor',
        'views',
        'tags',
    ];
    public function brands()
    {
        return $this->hasOne('App\Models\Brands', 'id', 'brands_id');
    }
    public function imageProduct()
    {
        return $this->hasMany('App\Models\ImgProduct', 'products_id', 'id');
    }
    public function infoProduct()
    {
        return $this->hasOne('App\Models\Info_product', 'products_id', 'id');
    }
    public function avatar()
    {
        return $this->hasOne('App\Models\ImgProduct', 'products_id', 'id')->where('level', 1);
    }    
}