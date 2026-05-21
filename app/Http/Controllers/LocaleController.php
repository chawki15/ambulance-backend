<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function switch(string $locale): RedirectResponse
    {
        $supportedLocales = ['fr', 'ar'];

        if (in_array($locale, $supportedLocales, true)) {
            session(['locale' => $locale]);
        }

        return redirect()->back();
    }
}
