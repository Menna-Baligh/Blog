<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function index(){
        $user = auth()->user();
        $likes = $user->likes()->get();
        // dd($posts);
        return view('posts.likes.index', compact('likes'));
    }
    public function like($postId){
        $post = Post::findOrFail($postId);
        $user = auth()->user();
        $like = $post->likes()->where('user_id', $user->id)->first();
        if ($like) {
            $like->delete();
        } else {
            $post->likes()->create(['user_id' => $user->id]);
        }
        return redirect()->back();
    }
    public function deleteAll(){
        $user = auth()->user();
        $user->likes()->delete();
        return redirect()->back();
    }

}
