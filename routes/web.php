<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AmbulanceController;
use App\Http\Controllers\Admin\MedicineController;
use App\Http\Controllers\Admin\StockMovementController;

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


    Route::middleware('auth')->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
        Route::view('/users/create', 'admin.users.create')->name('admin.users.create');
        Route::get('/users/{user}', [UserController::class, 'show'])->name('admin.users.show');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
        Route::patch('/users/{user}/activate', [UserController::class, 'activate'])->name('admin.users.activate');
        Route::patch('/users/{user}/deactivate', [UserController::class, 'deactivate'])->name('admin.users.deactivate');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    });


    Route::resource('ambulances', AmbulanceController::class);
    Route::get('/ambulances/create', [AmbulanceController::class, 'create'])
        ->name('ambulances.create');

    Route::get('/medicines', [MedicineController::class, 'index'])->name('medicines.index');
    Route::get('/medicines/create', [MedicineController::class, 'create'])
        ->name('medicines.create');

    Route::get(
        '/stock/',
        [StockMovementController::class, 'stockIn']
    )->name('admin.stock.index');


});