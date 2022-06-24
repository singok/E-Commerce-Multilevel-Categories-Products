<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
Use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\SpecificationController;

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
    Route::get('category-delete/{id}', 'destroy')->name('category.delete');
    Route::get('category-edit/{id}', 'edit')->name('category.edit');
    Route::get('category-restore', 'displayTrashedCategory')->name('category.restore');
    Route::get('category-remove/{id}', 'deletePermanently')->name('category.remove');
    Route::post('category/update', 'updateCategory')->name('category.update');
    Route::get('category-restinct/{id}', 'restoreCategory')->name('category.restinct');
});

Route::controller(ProductController::class)->prefix('admin')->group( function () {
    // list product
    Route::get('products/list', 'index')->name('product');

    // add product
    Route::get('products/add', 'add')->name('product.add');

    // store product
    Route::post('product/store', 'store')->name('product.store');

    // move to recycle bin 
    Route::get('product/remove/{id}', 'remove')->name('product.remove');

    // show edit form
    Route::get('product/edit/{id}', 'edit')->name('product.edit');

    // update product
    Route::post('product/update', 'update')->name('product.update');
});

Route::controller(ImageController::class)->prefix('admin/products')->group( function () {
    // display all available images 
    Route::get('images', 'index')->name('images.index');

    // show images add form
    Route::get('images/create', 'create')->name('images.create');

    // store images
    Route::post('images/store', 'store')->name('images.store');

    // remove product image along with description
    Route::get('image/delete/{id}', 'destroy')->name('productimage.remove');

    // edit product image & description
    Route::get('image/edit/{id}', 'edit')->name('productimage.edit');

    // product images with details clicked
    Route::post('image/update', 'update')->name('images.update');
});

Route::controller(SpecificationController::class)->prefix('admin/products')->group( function () {
    // list all specification
    Route::get('product/specification/{productname}/{id}', 'index')->name('specification.index');

    // store specificaton details
    Route::post('specification/store', 'store')->name('specification.add');

    // remove specification 
    Route::get('specification/{id}', 'destroy')->name('specification.delete');

    // show old data
    Route::get('specification/edit-specification/{id}', 'edit')->name('specification.edit');

    // update specification details
    Route::post('specification/update', 'update')->name('specification.update');
});