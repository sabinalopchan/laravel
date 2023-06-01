<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\ApplicationController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\UserLoginController;
use App\Http\Controllers\Frontend\CustomerController;
use App\Http\Controllers\Frontend\CustomerRegisterController;
use App\Http\Controllers\Frontend\CustomerLoginController;
use App\Http\Controllers\Frontend\ContactController;

Route::group(['namespace' => 'Frontend'], function () {
    Route::any('/', [ApplicationController::class, 'index'])->name('index');
    Route::any('about', [ApplicationController::class, 'about'])->name('about');
    Route::any('contact', [ApplicationController::class, 'contact'])->name('contact');
    Route::any('terms', [ApplicationController::class, 'terms'])->name('terms');
    Route::any('privacy', [ApplicationController::class, 'privacy'])->name('privacy');
    Route::any('category/{criteria?}', [ApplicationController::class, 'getProductByCategory'])->name('category');
    Route::any('product-details/{criteria?}', [ApplicationController::class, 'productDetails'])->name('product-details');
    Route::any('product-discount-details/{criteria?}', [ApplicationController::class, 'productDiscountDetails'])->name('product-discount-details');
    Route::any('product-offer-details/{criteria?}', [ApplicationController::class, 'productOfferDetails'])->name('product-offer-details');
    Route::any('search', [ApplicationController::class, 'search'])->name('search');
    Route::any('customer_dashboard', [ApplicationController::class, 'dashboard'])->name('customer_dashboard');
    Route::any('account_details', [ApplicationController::class, 'accountDetails'])->name('account_details');



    Route::get('customer_login', [CustomerLoginController::class, 'login'])->name('customer_login');
    Route::post('customer_login', [CustomerLoginController::class, 'customerLogin']);
    Route::any('customer_password_reset', [CustomerLoginController::class, 'customerPasswordReset'])->name('customer_password_reset');
    Route::any('customer_password_reset_link', [CustomerLoginController::class, 'customerPasswordResetLink'])->name('customer_password_link');


    Route::get('customer_register', [CustomerRegisterController::class, 'index'])->name('customer_register');
    Route::post('customer_register', [CustomerRegisterController::class, 'customerRegister']);

    Route::get('contact_user', [ContactController::class, 'index'])->name('contact_user');
    Route::post('contact_user', [ContactController::class, 'contactUser']);

});

Route::group(['namespace' => 'Backend'], function () {
    Route::get('/login', [UserLoginController::class, 'index'])->name('login');
    Route::post('/login', [UserLoginController::class, 'login']);
    Route::any('/password-reset', [UserLoginController::class, 'passwordReset'])->name('password_reset');
    Route::any('/password-reset-link', [UserLoginController::class, 'passwordResetLink'])->name('password_link');

});

Route::group(['namespace' => 'Backend', 'prefix' => 'company-backend', 'middleware' => 'auth'], function () {
    Route::any('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::any('customer', [DashboardController::class, 'customerRegister'])->name('customer');
    Route::any('customer_contact', [DashboardController::class, 'customerContact'])->name('customer_contact');

    Route::group(['prefix' => 'users'], function () {
        Route::any('/', [UserController::class, 'index'])->name('users');
        Route::any('/create_users', [UserController::class, 'insert'])->name('create_users');
        Route::any('/delete_users/{criteria?}', [UserController::class, 'delete'])->name('delete_users');
        Route::any('/edit_users/{criteria?}', [UserController::class, 'edit'])->name('edit_users');
        Route::any('/edit_users_action/{criteria?}', [UserController::class, 'editAction'])->name('edit_users_action');
        Route::any('/update_user_status', [Usercontroller::class, 'updateUserStatus'])->name('update_user_status');

        Route::resource('admin-slider', '\App\Http\Controllers\Backend\SliderController');
        Route::resource('admin-banner', '\App\Http\Controllers\Backend\BannerController');
//        Route::resource('admin-shipping', '\App\Http\Controllers\Backend\ShippingController');
        Route::resource('admin-logo', '\App\Http\Controllers\Backend\LogoController');
        Route::resource('admin-category', '\App\Http\Controllers\Backend\CategoryController');
        Route::resource('admin-product', '\App\Http\Controllers\Backend\ProductController');
        Route::resource('admin-discount', '\App\Http\Controllers\Backend\DiscountController');
        Route::resource('admin-product-discount', '\App\Http\Controllers\Backend\ProductOnDiscountController');
        Route::resource('admin-product-offer', '\App\Http\Controllers\Backend\ProductOnOfferController');

        Route::resource('admin-about', '\App\Http\Controllers\Backend\AboutController');
        Route::resource('admin-contact', '\App\Http\Controllers\Backend\ContactController');
        Route::resource('admin-footer', '\App\Http\Controllers\Backend\FooterController');

    });
});
