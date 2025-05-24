@extends('layouts.app')

@section('title')
    Likes
@endsection
@include('posts.navbar')
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-white text-center">
                        <h4>Likes</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Post Title</th>
                                    <th scope="col">Post Creator</th>
                                    <th scope="col">Like Date</th>
                                    <th scope="col">view</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($likes as $like)
                                    <tr>
                                        <td>{{ $like->post->title }}</td>
                                        <td>{{ $like->post->user->name }}</td>
                                        <td>{{ $like->created_at->format('Y-m-d') }}</td>
                                        <td>
                                            <a href="{{ route('posts.show', $like->post->id) }}" style="color: #383a3b;">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No likes available yet :(</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-4">
            
                @if ($likes->count() > 0)
                    <form action="{{ route('posts.likes.deleteAll') }}" method="POST" class="text-center">
                        @csrf
                        @method('DELETE') 
                        <button 
                            type="submit" 
                            class="clear-likes-btn"
                            {{-- onclick="return confirm('Are you sure you want to delete ALL likes?')" --}}
                            onclick="event.preventDefault(); confirmDelete()"
                        >
                            <i class="fas fa-trash-alt"></i> Clear All Likes
                        </button>
                        <script>
                                function confirmDelete() {
                                    Swal.fire({
                                        title: 'Delete All Likes?',
                                        text: 'Are You Sure!',
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#ff4444',
                                        cancelButtonColor: '#383a3b',
                                        confirmButtonText: 'Yes, delete!'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            document.querySelector('form').submit(); // Submit the parent form
                                        }
                                    });
                                }
                        </script>
                    </form>
                @endif
            
        </div>
    </div>
@endsection