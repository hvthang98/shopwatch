<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillDetails extends Model
{
    protected $table = 'bill_details';
    public function products()
    {
        return $this->hasOne('App\Models\Products',  'id', 'products_id');
    }
    public function bills()
    {
        return $this->hasOne('App\Models\Bills', 'bills_id', 'id');
    }
}
