@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection
@section('title')
Login
@endsection

@section('content')
    <div class="container-fluid d-flex justify-content-center align-items-center min-vh-100">
        <div class="row w-100 justify-content-center">
        <div class="col-md-6">
            <div class="card bg-black text-white">
            <div class="card-header text-center justify-content-center mt-4">
                <h4>Login</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('login.authenticate') }}" method="POST">
                    @csrf
                <div class="mb-3">
                    <label for="loginEmail" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="loginEmail" placeholder="Enter your email" required>
                </div>
                {{-- centerized error msg --}}
                @error('email')
                    <div style="color: rgb(155, 78, 78) ; font-size: 0.9rem; margin-top: 0.5rem ; text-align: center;">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="loginPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="loginPassword" placeholder="Enter password" required>
                </div>
                <button type="submit" class="btn btn-light w-100">Login</button>
                <div class="text-center mt-3">
                    <p>Don't have an account? <a href="{{ route('register') }}" class="text-light">Register</a></p>
                </div>
                </form>
            </div>
            </div>
        </div>
        </div>
    </div>
@endsection