<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        $locale = session('locale', 'np'); // Default to Nepali
        app()->setLocale($locale);
        return $next($request);
    }
}