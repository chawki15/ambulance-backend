<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DriverController;

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

Route::get('/recrutement', function () {
    $isArabic = app()->getLocale() === 'ar';
    return view('recrutement', compact('isArabic'));
})->name('recrutement');

Route::get('/galeries', function () {
    $isArabic = app()->getLocale() === 'ar';
    return view('galeries', compact('isArabic'));
})->name('galeries');

Route::get('/galeries/{slug}', function ($slug) {
    $isArabic = app()->getLocale() === 'ar';
    return view('galeries-detail', compact('slug', 'isArabic'));
})->name('galeries.detail');

Route::get('/videos', function () {
    $isArabic = app()->getLocale() === 'ar';
    return view('videos', compact('isArabic'));
})->name('videos');

Route::get('/videos/{slug}', function ($slug) {
    $isArabic = app()->getLocale() === 'ar';
    return view('show', compact('isArabic', 'slug'));
})->name('video.detail');

Route::get('/news', function () {
    $isArabic = app()->getLocale() === 'ar';
    return view('news', compact('isArabic'));
})->name('news');

Route::get('/news/{slug}', function ($slug) {
    $isArabic = app()->getLocale() === 'ar';
    return view('news-detail', compact('slug', 'isArabic'));
})->name('news.detail');

Route::get('/contact', function () {
    $isArabic = app()->getLocale() === 'ar';
    return view('contact', compact('isArabic'));
})->name('contact');

Route::get('/lang/{locale}', [LocaleController::class, 'switch'])->name('lang.switch');

Route::prefix('admin')->group(function () {

    Route::get('/', function () {
        return auth()->check()
            ? redirect()->route('admin.dashboard')
            : redirect()->route('admin.login');
    })->name('admin.home');

    Route::get('/login', [AdminUserController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AdminUserController::class, 'login'])->name('admin.login.post');

    Route::post('/logout', [AdminUserController::class, 'logout'])->name('admin.logout');

    Route::get('/dashboard', function () {
        return view('admin.dashboard.index');
    })->middleware('auth')->name('admin.dashboard');


    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::view('/users/create', 'admin.users.create')->name('admin.users.create');


    Route::get('/drivers', [DriverController::class, 'index'])
        ->name('admin.drivers.index');
    Route::view('/drivers/create', 'admin.drivers.create')
        ->name('admin.drivers.create');

    Route::view('/medicines', 'admin.medicines')->name('admin.medicines');
    Route::view('/medicines/create', 'admin.medicines-create')->name('admin.medicines.create');

    Route::view('/stock-movements/in', 'admin.stock-in')->name('admin.stock.in');
});