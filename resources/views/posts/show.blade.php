@extends('layouts.app')

@section('title')
    show
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@include('posts.navbar')

@section('content')

    <div class="blog-container">
        <div class="post-container">
            <div class="post-header">
                <img src="data:image/png;base64,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" alt="Avatar" class="avatar">
                <div class="info">
                    <h3>{{ $post->user->name }}</h3>
                    <p>{{ $post->created_at->diffForHumans() }}</p>
                </div>
            </div>
            <div class="post-content">
                <h2>{{ $post->title }}</h2>
                <hr>
                <p>{{ $post->description }}</p>
            </div>
            <div class="post-actions">
                <form action="{{ route('posts.like' , $post->id) }}" method="post">
                    @csrf
                    @if(Auth::check() && $post->likes()->where('user_id' , auth()->user()->id)->exists())
                        <button type="submit" class="liked"><i class="fa-solid fa-heart"></i>Liked</button>
                    @else
                        <button type="submit"><i class="fa-regular fa-heart"></i>Like</button>
                    @endif
                </form>
                <button id="commentButton">💬 Comment</button>
                <button>🔗 Share</button>
            </div>
        </div>

        <div class="comments-section">
            <h3>Comments</h3>
            @forelse ($comments as $comment)
                <div class="comment">
                    <img src="data:image/jpeg;base64,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" alt="Avatar" class="avatar">
                        <div class="content">
                <div class="comment-header">
                    <h4>{{ $comment->user->name }}</h4>
                    @if(Auth::check() && (Auth::id() == $comment->user_id || Auth::user()->is_admin))
                        <div class="comment-actions">
                            <a class="edit-comment" href="{{ route('posts.comments.edit', [$comment->post->id,$comment->id]) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('posts.comments.destroy', [$comment->post->id,$comment->id]) }}" method="POST" class="delete-comment-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-comment">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
                <p>{{ $comment->comment }}</p>
                <span>{{ $comment->created_at->format('Y-m-d h:i A') }}</span>
            </div>
        </div>
                        
            @empty
                {{-- no comments --}}
                <div class="no-comments">
                    <div class="no-comments-icon">
                        <i class="far fa-comment-dots"></i>
                    </div>
                    <p>No comments yet. Be the first to share your thoughts!</p>
                </div>
            @endforelse
            
            
            <div class="comment-input">
                <form action="{{ route('posts.comments.store', $post->id) }}" method="post">
                    @csrf
                    <input type="text" name="comment" placeholder="Write a comment..." id="commentInput">
                    <button type="submit">Post</button>
                </form>
                
            </div>
            <div class="pagination-wrapper">
                <div class="pagination">
                {{ $comments->links() }}
                </div>
            </div>
            
        </div>
    </div>
    

@endsection




