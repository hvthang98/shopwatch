<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuCategory extends Model
{
    protected $table='menu_category';
    public $fillable=[
        'menus_id','categories_id'
    ];
    public function category()
    {
        return $this->belongsTo('App\Models\Categories', 'categories_id', 'id');
    }
}
