<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuBrand extends Model
{
    protected $table = 'menu_brand';
    public $fillable = [
        'brands_id','menus_id'
    ];
    public function brand()
    {
        return $this->belongsTo('App\Models\Brands', 'brands_id', 'id');
    }
}
