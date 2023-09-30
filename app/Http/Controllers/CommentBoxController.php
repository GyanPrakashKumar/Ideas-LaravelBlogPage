<?php

namespace App\Http\Controllers;

use App\Models\CommentBox;
use App\Models\Idea;
use Illuminate\Http\Request;

class CommentBoxController extends Controller
{
    public function store(Idea $idea)
    {
        // dump(request()->all());
        // dd(request()->content);
        $comment = new CommentBox();
        $comment->idea_id = $idea->id;
        $comment->content = request()->get('content');
        $comment->save();

        return redirect()->route('ideas.show', $idea->id)->with('success', 'Comment was created successfully!');
    }
}
