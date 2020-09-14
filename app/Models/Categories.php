<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';
    public function brandCategories()
    {
        return $this->hasMany('App\Models\BrandCategories', 'categories_id', 'id');
    }
    
}
