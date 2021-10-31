<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformationCompany extends Model
{
    protected $table = 'information_company';
    protected $fillable = [
        'address', 'phone', 'email'
    ];
}
