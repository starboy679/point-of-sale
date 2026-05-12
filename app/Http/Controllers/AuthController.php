<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        
        return view('login');
    }
    public function login()
    {
        $user= \App\Models\User::where('name', request('name'))->first();

        if($user && \Illuminate\Support\Facades\Hash::check(request('password'), $user->password)){

        auth()->login($user);
        
        if($user->role =='admin'){
            return redirect('/dashboard');
        }
        
        if($user->role =='cashier'){
            return redirect('/pos');
        }

        if($user->role =='inventory'){
            return redirect('/inventory');
        }
}
    return back()->withErrors([
        'message' => 'Invalid credentials'
    ]);
    }
}
