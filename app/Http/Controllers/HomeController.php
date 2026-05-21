<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $isArabic = app()->getLocale() === 'ar';

        return view('home', compact('isArabic'));
    }
}
