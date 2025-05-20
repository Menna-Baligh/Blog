<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function register(){
        return view('auth.register');
    }
    public function store(Request $request){
        $request->validate([
            'name' => ['required' , 'min:3'],
            'email' => ['required' , 'email'],
            'password' => ['required' , 'min:5' , 'confirmed'] ,
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        auth()->login($user);
        return to_route('posts.index');

    }
    public function login(){
        return view('auth.login');
    }
    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => ['required' , 'email'],
            'password' => ['required' , 'min:5']
        ]);
        if(auth()->attempt($credentials)){
            $request->session()->regenerate();
            session()->flash('welcome','Welcome, '.auth()->user()->name.' We are Happy To Have You Back :)');
            return to_route('posts.index');
        }
        return back()->withErrors([
            'email' => 'Invalid credentials'
        ]);

    }
    public function logout(){
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return to_route('login');
    }
}
