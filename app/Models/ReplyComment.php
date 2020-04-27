<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReplyComment extends Model
{
    protected $table="reply_comment";
    public function users()
    {
        return $this->hasOne('App\Models\Users', 'id', 'users_id');
    }
}
