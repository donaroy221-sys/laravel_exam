<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
     public function register(Request $request){
        return view('auth.register');
    }
    public function registerPost(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);
        
       $user = User::create([
        'name'   => $request->name,
        'email' => $request->email,
        'password' => $request->password,
    ]);
       if($user){
        return redirect()->route('login');
       }
    
    }
   

    public function login(Request $request){
        return view("auth.login");
    }

    public function loginPost(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if(Auth::attempt($request->only('email','password'))){
            return redirect()->route('employee.index'); // fixed
        }
    
        return back()->with('error', 'Invalid credentials');
    }
    


    public function logout(Request $request)
    {
        auth()->logout();
        return redirect()->route("register");
    }
}


