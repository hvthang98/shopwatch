<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    Protected $table = 'menus';
    public $fillable = [
        'name','status','ordernum'
    ];
}
