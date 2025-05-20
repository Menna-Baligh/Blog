@extends('layouts.app')
@section('title')
    Blog
@endsection

@include('posts.navbar')

@section('content')
<div class="container mt-4">

    <div class="text-center mb-4">
        <a class="btn btn-success" href="{{ route('posts.create') }}">Create Post</a>
    </div>

    <div class="d-flex justify-content-center">
        <div class="w-75"> <!-- Adjust width as needed -->
            <div class="card shadow-sm">
                <div class="card-body">
                    <table class="table table-bordered table-hover text-center">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Posted By</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($posts as $post)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $post['title'] }}</td>
                                <td>{{ $post->user->name }}</td>
                                <td>{{ $post->created_at->format('Y-m-d') }}</td>
                                <td>
                                    <a href="{{ route('posts.show' , $post['id']) }}" class="btn btn-info btn-sm">View</a>
                                    <form action="{{ route('posts.edit' , $post['id']) }}" method="get" style="display: inline">
                                        <button type="submit" class="btn btn-primary btn-sm"
                                            @php if(Auth::check())if(auth()->user()->id != $post->user->id) echo 'disabled'; @endphp
                                        >Edit</button>
                                    </form>
                                    <form style="display:inline" action="{{route('posts.destroy' , $post['id'])}}" method="post" onsubmit="return confirm('Are you sure you want to delete this post?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                        @php if(Auth::check())if(auth()->user()->id != $post->user->id) echo 'disabled'; @endphp
                                        >Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No posts available</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection