<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\AdminUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/about', function () {
    $isArabic = app()->getLocale() === 'ar';
    return view('about', compact('isArabic'));
})->name('about');

Route::get('/services', function () {
    $isArabic = app()->getLocale() === 'ar';
    return view('services', compact('isArabic'));
})->name('services');

Route::get('/fleet', function () {
    $isArabic = app()->getLocale() === 'ar';
    return view('fleet', compact('isArabic'));
})->name('fleet');

Route::get('/partners', function () {
    $isArabic = app()->getLocale() === 'ar';
    return view('partners', compact('isArabic'));
})->name('partners');

Route::get('/news', function () {
    $isArabic = app()->getLocale() === 'ar';
    return view('news', compact('isArabic'));
})->name('news');

Route::get('/contact', function () {
    $isArabic = app()->getLocale() === 'ar';
    return view('contact', compact('isArabic'));
})->name('contact');

Route::get('/lang/{locale}', [LocaleController::class, 'switch'])->name('lang.switch');

Route::prefix('admin')->group(function () {
    Route::view('/login', 'admin.login')->name('admin.login');
    Route::redirect('/', '/admin/login')->name('admin.home');

    Route::view('/home', 'admin.home')->name('admin.dashboard');

    Route::view('/users/create', 'admin.users-create')->name('admin.users.create');
    Route::get('/users', function () {
        $users = \App\Models\User::query()->latest()->get();
        return view('admin.users', compact('users'));
    })->name('admin.users.index');

    Route::view('/medicines', 'admin.medicines')->name('admin.medicines');
    Route::view('/medicines/create', 'admin.medicines-create')->name('admin.medicines.create');

    Route::view('/stock-movements/in', 'admin.stock-in')->name('admin.stock.in');
});