<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    public function create(CommentRequest $request)
    {
        Comment::create([
            'user_id' => Auth::id(),
            'item_id'=> $request->item_id,
            'comment' => $request->comment
        ]);

        return redirect()->back();
    }
}
