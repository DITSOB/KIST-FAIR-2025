<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin(){
        return view('login');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if(Auth::attempt($credentials)){
            if(Auth::check() && Auth::user()->role === 'admin'){
                return redirect()->intended('/admin-dashboard');
            }else{
                return redirect()->intended('/dashboard');
            } 
        }

        return redirect()->withErrors(['message' => 'Invalid Credentials']);
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }

    public function showSignup(){
        return view('signup');
    }

    public function register(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        try{
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            Auth::login($user);

            return redirect()->route('dashboard');

        } catch(\Exception $e){
            return back()->withErrors(['message' => 'Something went wrong with registration.']);
        }

    }
    
}
