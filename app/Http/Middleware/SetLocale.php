<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        $supportedLocales = ['fr', 'ar'];

        $locale = $request->query('lang');

        if (!in_array($locale, $supportedLocales, true)) {
            $acceptedLanguages = $request->getLanguages();

            foreach ($acceptedLanguages as $acceptedLanguage) {
                $normalizedLocale = strtolower(substr($acceptedLanguage, 0, 2));

                if (in_array($normalizedLocale, $supportedLocales, true)) {
                    $locale = $normalizedLocale;
                    break;
                }
            }
        }

        app()->setLocale(in_array($locale, $supportedLocales, true) ? $locale : config('app.locale'));

        return $next($request);
    }
}
