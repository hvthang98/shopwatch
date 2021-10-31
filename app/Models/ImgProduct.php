<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImgProduct extends Model
{
    protected $table = 'image_product';
    protected $fillable = [
        'image', 'status', 'level', 'products_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'id', 'product_id');
    }
}
