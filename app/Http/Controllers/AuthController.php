<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(){
        session()->put('success','Item Successfully Created.');
        return view("login");
    }

    public function auth(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = User::where('email', 'like', $request->email)->first();
            if($user->role_id == 1){
                return response()->json(['redirect_url' => '/dashboard']);
            }
        } 
        
        return response()->json(['message' => 'Email atau password salah'], 401);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect("/login");
    }

}
