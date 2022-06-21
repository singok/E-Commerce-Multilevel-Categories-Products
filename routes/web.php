<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
Use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('login');
})->name('admin.login');

Route::get('register', function () {
    return view('register');
})->name('admin.register');

Route::post('register', [AdminController::class, 'register'])->name('admin.save');
Route::post('login', [AdminController::class, 'login'])->name('admin.access'); 
Route::get('password-forget', [AdminController::class, 'forget'])->name('admin.forget');
Route::post('password-link', [AdminController::class, 'resetlink'])->name('admin.resetlink');
Route::get('password/update/{email}/{token}', [AdminController::class, 'update']);  
Route::get('password/reset/{email}/{token}', [AdminController::class, 'reset'])->name('admin.updatePassword');

/*----------------Facebook----------------*/
Route::prefix('auth')->group(function () {
    Route::get('redirect', [FacebookController::class, 'redirectToFacebook'])->name('admin.facebook');
    Route::get('facebook/callback',[FacebookController::class, 'handleCallback']);
});

/*-------------------Dashboard------------------*/
Route::controller(DashboardController::class)->prefix('admin')->group( function () {
    Route::get('dashboard', 'index')->name('admin.dashboard');
    Route::get('category', 'displayCategory')->name('category');
    Route::get('category-add', 'addForm')->name('category.add');
    Route::post('category-store', 'store')->name('category.insert');
});
