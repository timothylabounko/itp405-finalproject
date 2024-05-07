<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Store a newly created comment.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'body' => 'required|string',
        ]);

        if (Auth::check()) {
            $viewer = Auth::user();
            $this->createComment($viewer, $validatedData['body']);
            return redirect()->back()->with('success', 'Comment added successfully!');
        } else {
            return redirect()->route('login')->with('error', 'Please login to add a comment.');
        }
    }

    public function showComments()
    {
        if (Auth::check()) {
            $viewer = Auth::user();
            $comments = $viewer->comments; 
            return view('blog', compact('viewer', 'comments'));
        } else {
            return redirect()->route('login')->with('error', 'Please login to view comments.');
        }
    }

    public function edit($id)
    {
        $comment = Comment::findOrFail($id);

        if ($comment->viewer_id === auth()->id()) {
            return view('comment.edit', compact('comment'));
        } else {
            return redirect()->back()->with('error', 'You are not authorized to edit this comment.');
        }
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        if ($comment->viewer_id === auth()->id()) {
            $comment->delete();
            return redirect()->back()->with('success', 'Comment deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'You are not authorized to delete this comment.');
        }
    }

    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);

        if ($comment->viewer_id === auth()->id()) {
            $validatedData = $request->validate([
                'body' => 'required|string',
            ]);

            $comment->update($validatedData);

            return redirect()->route('blog')->with('success', 'Comment updated successfully!');
        } else {
            return redirect()->back()->with('error', 'You are not authorized to edit this comment.');
        }
    }


    /**
     * Create a new comment.
     *
     * @param  \App\Models\Viewer  $viewer
     * @param  string  $body
     * @return void
     */
    private function createComment($viewer, $body)
    {
        $comment = new Comment();
        $comment->viewer_id = $viewer->id;
        $comment->body = $body;
        $comment->save();
    }
}
