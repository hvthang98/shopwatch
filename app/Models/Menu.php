<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';
    public $fillable = [
        'name','status','sort', 'menu_parent', 'slug' 
    ];
}
