<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthenticationController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/register','store')->name('register.store');
    Route::get('/login','login')->name('login');
    Route::post('/login','authenticate')->name('login.authenticate');
    Route::get('/logout','logout')->name('logout');
});

Route::controller(PostController::class)->group(function (){
    Route::middleware('auth')->group(function () {
        Route::get('/posts/create' ,  'create')->name('posts.create');
        Route::post('/posts' ,  'store')->name('posts.store');
        Route::get('/posts/{post}/edit' ,  'edit')->name('posts.edit');
        Route::put('/posts/{post}', 'update')->name('posts.update');
        Route::delete('/posts/{post}' , 'destroy')->name('posts.destroy');
    });
    Route::get('/' , 'index')->name('posts.index');
    Route::get('/posts/{post}/show' , 'show')->name(('posts.show'));
});

Route::middleware('auth')->controller(LikeController::class)->group(function () {
    Route::get('/posts/likes','index')->name('posts.likes.index');
    Route::delete('/posts/likes/delete','deleteAll')->name('posts.likes.deleteAll');
    Route::post('/posts/{post}/like', 'like')->name('posts.like');
});











/**
 * 1- define new route
 * 2- define controller to handle the logic of render view
 * 3- define the view you want to render
 * 4- remove static html data form view
 */


