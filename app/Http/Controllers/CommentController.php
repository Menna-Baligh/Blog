<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store($postId , Request $request){
        $post = Post::findOrFail($postId);
        $request->validate([
            'comment' => 'required|string|max:255',
        ]);
        $comment = $post->comments()->create([
            'comment' => $request->input('comment'),
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->route('posts.show', $postId);
    }
    public function destroy($postId, $commentId){
        $post = Post::findOrFail($postId);
        $comment = $post->comments()->findOrFail($commentId);
        if (Auth::user()->id !== $comment->user_id) {
            return redirect()->route('posts.show', $postId);
        }
        $comment->delete();
        return redirect()->route('posts.show', $postId);
    }
    public function edit($postId , $commnetId){
        $post = Post::findOrFail($postId);
        $comment = $post->comments()->findOrFail($commnetId);
        if (Auth::user()->id !== $comment->user_id) {
            return redirect()->route('posts.show', $postId);
        }
        return view('posts.comments.edit', compact('post', 'comment'));
    }
    public function update($postId , $commnetId , Request $request){
        $post = Post::findOrFail($postId);
        $comment = $post->comments()->findOrFail($commnetId);
        if (Auth::user()->id !== $comment->user_id) {
            return redirect()->route('posts.show', $postId);
        }
        $request->validate([
            'comment' => 'required|string|max:255',
        ]);
        $comment->update([
            'comment' => $request->input('comment'),
        ]);
        return redirect()->route('posts.show', $postId);
    }
}
