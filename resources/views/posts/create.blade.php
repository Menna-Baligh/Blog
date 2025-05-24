@extends('layouts.app')

@section('title')
    create
@endsection

@include('posts.navbar')


@section('content')
    
    <div class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-header bg-dark text-white text-center">
                            <h4>Create New Post</h4>
                        </div>
                        <div class="card-body">
                            @if($errors->any())
                                <div class="mb-3">
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger text-center" role="alert">
                                            {{ $error }}
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                            <form action="{{ route('posts.store') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Title</label>
                                    <input name="title" type="text" class="form-control" placeholder="Enter post title" required value="{{ old('title') }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Description</label>
                                    <textarea name="description" class="form-control" rows="4" placeholder="Enter post description" required>{{ old('description') }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Post Creator</label>
                                    <select name="post_creator" class="form-select" required>
                                        <option value="" disabled selected>Select creator</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-dark">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection