<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    protected $table='bills';
    public function users()
    {
        return $this->hasOne('App\Models\Users', 'id','users_id');
    }
}
