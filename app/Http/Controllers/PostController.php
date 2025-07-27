<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all() ;
        return view('posts.index' ,['posts' => $posts]);
    }
    public function show(Post $post){
        $comments = $post->comments()->paginate(2);
        $tags = $post->tags()->get();
        return view('posts.show' ,['post' => $post , 'comments' => $comments , 'tags' => $tags]);
    }
    public function create(){
        $users = User::all();
        $tags = Tag::all();
        return view('posts.create',['users' => $users , 'tags' => $tags]);
    }
    public function store(Request $request){
        //? 0- validate data
        $request->validate([
            'title' => ['required' , 'min:3'] ,
            'description' => ['required' , 'min:5'] ,
            'post_creator' => ['required','exists:users,id']
        ]);
        //? 1- fetch the data from the request
        $title = request()->title ;
        $desc = request()->description ;
        $postCreator = request()->post_creator ;

        // use dump and die to stop the execution and see the data
        // dd($title , $desc , $postCreator);

        //? 2- store the data in the database
        $post = Post::create([
            'title' => $title ,
            'description' => $desc ,
            'user_id' => Auth::user()->id,
        ]);
        $post->tags()->attach($request->tags);

        //? 3- redirect to all posts page
        return to_route('posts.index');


    }
    public function edit(Post $post){
        if (auth()->user()->id != $post->user_id) {
            abort(403, 'Unauthorized action.');
        }
        $users = User::all();
        $tags = Tag::all();
        return view('posts.edit',['post' => $post , 'users' => $users , 'tags' => $tags]);
    }
    public function update($postId , Request $request){
        $post = Post::findOrFail($postId);
        $data = request()->all();
        $request->validate([
            'title' => ['required' , 'min:3'] ,
            'description' => ['required' , 'min:5'] ,
            'post_creator' => ['required','exists:users,id']
        ]);
        $post->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id' => $data['post_creator']
        ]);
        $post->tags()->sync($data['tags']);
        return to_route('posts.show' , ['post' => $post]);
    }
    public function destroy($postId){
        $post  = Post::findOrFail($postId);
        if (auth()->user()->id != $post->user_id) {
            abort(403, 'Unauthorized action.');
        }
        // 1- delete post from dataBase
        $post->delete();
        // 2- redirct to all posts page
        return to_route('posts.index');
    }
}
