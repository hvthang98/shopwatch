<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrandCategories extends Model
{
    protected $table='brand_categories';
    public $fillable = [
        'categories_id',
        'brands_id'
    ];
    public function brand()
    {
        return $this->belongsTo('App\Models\Brands', 'brands_id', 'id');
    }
}
