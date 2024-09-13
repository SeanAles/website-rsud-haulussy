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
            if($user->role_id === 1 || $user->role_id === 2){
                return response()->json(['redirect_url' => '/dashboard']);
            }
            if($user->role_id === 3){
                return response()->json(['redirect_url' => '/bed']);
            }
            if($user->role_id === 4){
                return response()->json(['redirect_url' => '/article']);
            }
            if($user->role_id === 5){
                return response()->json(['redirect_url' => '/news']);
            }
            if($user->role_id === 6){
                return response()->json(['redirect_url' => '/suggestion']);
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
