<?php

namespace App\Http\Controllers\FontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\ReplyComment;

class CommentController extends Controller
{
    public function delete(Request $request)
    {
        Comment::find($request->id)->delete();
        return redirect()->back()->with('notification','Đã xóa bình luận');
    }
    public function deleteReply(Request $request)
    {
        ReplyComment::find($request->id)->delete();
        return redirect()->back()->with('notification','Đã xóa bình luận');
    }
}
