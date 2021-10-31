<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ImgProduct;

class Product extends Model
{
    const STATUS_SHOW = 1, STATUS_HIDE = 0;

    protected $table = 'products';
    public $guarded  = [];

    public function brands()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function imageProduct()
    {
        return $this->hasMany(ImgProduct::class, 'products_id', 'id');
    }

    public function avatar()
    {
        return $this->hasOne(ImgProduct::class, 'products_id', 'id')->where('level', 1);
    }

    public function getStatus()
    {
        switch ($this->status) {
            case Product::STATUS_HIDE:
                return __('Hide');
                break;
            case Product::STATUS_SHOW:
                return __('show');
                break;
            default:
                return null;
                break;
        }
    }
}
