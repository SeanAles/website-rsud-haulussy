<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role_id !== 1 && Auth::user()->role_id !== 2) {
            abort(404);
        }

        // Session timeout check (15 menit inactivity untuk admin)
        $lastActivity = $request->session()->get('last_activity');
        if ($lastActivity && (time() - $lastActivity > 900)) { // 15 minutes
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            Log::info('Admin session expired', [
                'user' => Auth::user()->email,
                'ip' => $request->ip(),
                'last_activity' => $lastActivity
            ]);

            return redirect()->route('login')->with('message', 'Sesi Anda telah kedaluwarsa karena tidak ada aktivitas');
        }

        // Update last activity
        $request->session()->put('last_activity', time());

        // Log admin activity
        $this->logAdminActivity($request);

        return $next($request);
    }

    private function logAdminActivity(Request $request)
    {
        $user = Auth::user();
        $logMessage = sprintf(
            "[%s] Admin %s (%s) accessed %s from IP %s",
            now()->format('Y-m-d H:i:s'),
            $user->name,
            $user->email,
            $request->path(),
            $request->ip()
        );

        // Create log directory jika belum ada
        $logDir = storage_path('logs');
        if (!is_dir($logDir)) {
            mkdir($logDir, 0755, true);
        }

        $logFile = $logDir . '/admin_activity.log';
        file_put_contents($logFile, $logMessage . PHP_EOL, FILE_APPEND | LOCK_EX);
    }
}
