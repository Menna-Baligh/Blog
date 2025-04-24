<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

//* show all posts
Route::get('/posts' , [PostController::class, 'index'])->name('posts.index');
//* create new post
Route::get('/posts/create' , [PostController::class, 'create'])->name('posts.create');
//* store data
Route::post('/posts' , [PostController::class, 'store'])->name('posts.store');
//* edit post
Route::get('/posts/{post}/edit' , [PostController::class, 'edit'])->name('posts.edit');
//* update
Route::put('/posts/{post}',[PostController::class, 'update'])->name('posts.update');
//* show single post
Route::get('/posts/{post}' , [PostController::class, 'show'])->name(('posts.show'));
//* delete post
Route::delete('/posts/{post}' ,[PostController::class, 'destroy'])->name('posts.destroy');











/**
 * 1- define new route
 * 2- define controller to handle the logic of render view
 * 3- define the view you want to render
 * 4- remove static html data form view
 */


