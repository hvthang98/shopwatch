<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comments";
    protected $fillable = [
        'content', 'images', 'reply_comment', 'user_id', 'product_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function product_id()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function replyComment()
    {
        return Comment::where('reply_comment', $this->id)->get();
    }
}
