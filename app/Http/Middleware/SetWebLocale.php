<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetWebLocale
{
    public function handle(Request $request, Closure $next)
    {
        $locale = session('locale');

        if (in_array($locale, ['fr', 'ar'], true)) {
            app()->setLocale($locale);
        }

        return $next($request);
    }
}
