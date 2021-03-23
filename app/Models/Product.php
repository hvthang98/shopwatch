<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ImgProduct;

class Product extends Model
{
    const SHOW_STATUS = 'Hiện';
    const HIDE_STATUS = 'Ẩn';
    protected $table = 'products';
    public $guarded  = ['views'];

    public function brands()
    {
        return $this->hasOne('App\Models\Brands', 'id', 'brands_id');
    }
    public function imageProduct()
    {
        return $this->hasMany(ImgProduct::class, 'products_id', 'id');
    }
    public function infoProduct()
    {
        return $this->hasOne('App\Models\Info_product', 'products_id', 'id');
    }
    public function avatar()
    {
        return $this->hasOne('App\Models\ImgProduct', 'products_id', 'id')->where('level', 1);
    }

    public function getStatus()
    {
        switch ($this->status) {
            case 0:
                return Product::HIDE_STATUS;
                break;
            case 1:
                return Product::SHOW_STATUS;
                break;
            default:
                return null;
                break;
        }
    }
}
