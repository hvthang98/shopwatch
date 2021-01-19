<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    protected $table='brands';
    protected $fillable = [
        'name', 'info','status'
    ];
    public function product(){
    	return $this->hasMany('App\Models\Products','brands_id','id');
    }
}
