<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table="comment";
    public function users()
    {
        return $this->hasOne('App\Models\Users', 'id', 'users_id');
    }
    public function replyComment()
    {
        return $this->hasMany('App\Models\ReplyComment', 'comment_id', 'id');
    }
}
