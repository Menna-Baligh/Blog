@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection
@section('title')
Register
@endsection
@section('content')
        <div class="container-fluid d-flex justify-content-center align-items-center min-vh-100">
            <div class="row w-100 justify-content-center">
            <div class="col-md-6">

            <!-- Register Form -->
            <div class="card bg-black text-white mb-4">
            <div class="card-header text-center justify-content-center mt-4">
                <h4>Register Form</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('register.store') }}" method="POST">
                    @csrf
                <div class="mb-3">
                    <label for="registerName" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="registerName" placeholder="Enter your name" required value="{{ old('name') }}">
                    @error('name')
                        <span style="color: rgb(155, 78, 78)">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="registerEmail" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="registerEmail" placeholder="Enter your email" required value="{{ old('email') }}">
                    @error('email')
                        <span style="color: rgb(155, 78, 78)">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="registerPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="registerPassword" placeholder="Enter password" required>
                    @error('password')
                        <span style="color: rgb(155, 78, 78)">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="registerConfirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="registerConfirmPassword" placeholder="Confirm password" required>
                    
                </div>
                <button type="submit" class="btn btn-light w-100">Register</button>
                <div class="text-center mt-3">
                    <p>Already have an account? <a href="{{ route('login') }}" class="text-light">Login</a></p>
                </form>
            </div>
            </div>

            
            

        </div>
        </div>
    </div>
@endsection

