<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    Protected $table = 'menus';
    public $fillable = [
        'name','status','ordernum'
    ];
    public function menuBrand()
    {
        return $this->hasMany('App\Models\MenuBrand', 'menus_id', 'id');
    }
    public function menuCategory()
    {
        return $this->hasMany('App\Models\MenuCategory', 'menus_id', 'id');
    }
}
