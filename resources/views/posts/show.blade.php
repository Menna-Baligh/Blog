@extends('layouts.app')

@section('title')
    show
@endsection

@section('content')
<div class="container mt-5">

    <!-- Post Info Card -->
    <div class="d-flex justify-content-center mb-4">
        <div class="card shadow-sm w-75 border-primary">
            <div class="card-header bg-primary text-white text-center">
                Post Info
            </div>
            <div class="card-body">
                <h5 class="card-title"><strong>Title:</strong> {{ $post['title'] }}</h5>
                <p class="card-text"><strong>Description:</strong> {{ $post['description'] }}</p>
            </div>
        </div>
    </div>

    <!-- Post Creator Info Card -->
    <div class="d-flex justify-content-center">
        <div class="card shadow-sm w-75 border-secondary">
            <div class="card-header bg-secondary text-white text-center">
                Post Creator Info
            </div>
            <div class="card-body">
                <h5 class="card-title"><strong>Name : </strong>{{ $post->user->name }}</h5>
                <p class="card-text"><strong>Email : </strong>{{ $post->user->email }}</p>
                <p class="card-text"><strong>Created At : </strong>{{ $post->user->created_at->format('Y-m-d') }}</p>
            </div>
        </div>
    </div>

</div>


@endsection

