<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SanitizeInput
{
    public function handle(Request $request, Closure $next)
    {
        // Sanitize email inputs
        if ($request->has('email')) {
            $sanitizedEmail = filter_var($request->input('email'), FILTER_SANITIZE_EMAIL);
            $request->merge(['email' => $sanitizedEmail]);
        }

        // Sanitize name inputs
        if ($request->has('name')) {
            $sanitizedName = htmlspecialchars($request->input('name'), ENT_QUOTES, 'UTF-8');
            $request->merge(['name' => $sanitizedName]);
        }

        // Sanitize string inputs di admin areas
        if (str_starts_with($request->path(), 'admin') ||
            str_contains($request->path(), 'dashboard') ||
            str_contains($request->path(), '/account')) {

            foreach ($request->all() as $key => $value) {
                if (is_string($value)) {
                    $sanitizedValue = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
                    $request->merge([$key => $sanitizedValue]);
                }
            }
        }

        return $next($request);
    }
}