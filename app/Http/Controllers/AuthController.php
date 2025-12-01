<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function login()
    {
        return view("login");
    }

    public function auth(Request $request)
    {
        // Rate limiting: 3 attempts per minute per email
        $throttleKey = Str::lower($request->input('email')).'|login';

        if (RateLimiter::tooManyAttempts($throttleKey, 3)) {
            $seconds = RateLimiter::availableIn($throttleKey);
            return response()->json([
                'message' => 'Terlalu banyak percobaan login. Silakan coba lagi dalam '.$seconds.' detik.'
            ], 429);
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            RateLimiter::clear($throttleKey);
            $request->session()->regenerate();

            // Query yang lebih aman (ganti 'like' dengan 'where')
            $user = User::where('email', $request->email)->first();

            // Log successful login
            Log::info('User login successful', [
                'email' => $request->email,
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'timestamp' => Carbon::now()->toDateTimeString()
            ]);

            // Update last activity for session timeout
            $request->session()->put('last_activity', time());
            $request->session()->put('login_ip', $request->ip());

            if ($user->role_id === 1 || $user->role_id === 2) {
                return response()->json(['redirect_url' => '/dashboard']);
            }
            if ($user->role_id === 3) {
                return response()->json(['redirect_url' => '/bed']);
            }
            if ($user->role_id === 4) {
                return response()->json(['redirect_url' => '/article']);
            }
            if ($user->role_id === 5) {
                return response()->json(['redirect_url' => '/news']);
            }
            if ($user->role_id === 6) {
                return response()->json(['redirect_url' => '/suggestion']);
            }
            if ($user->role_id === 7) {
                return response()->json(['redirect_url' => '/event']);
            }
        }

        // Increment failed attempts
        RateLimiter::hit($throttleKey, 60); // 60 seconds timeout

        // Log failed login attempt
        Log::warning('User login failed', [
            'email' => $request->email,
            'ip' => $request->ip(),
            'attempts' => RateLimiter::attempts($throttleKey),
            'timestamp' => Carbon::now()->toDateTimeString()
        ]);

        return response()->json(['message' => 'Email atau password salah'], 401);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect("/login");
    }
}
