<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Info_product extends Model
{
    protected $table='info_product';
    public $timestamps = false; 
    public function product(){
    	return $this->belongTo('App\Models\Products',  'products_id','id');

    }
}
