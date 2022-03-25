<?php

use App\Http\Controllers\Backoffice\AdminCategoryController;
use App\Http\Controllers\Backoffice\DashboardPostController;
use App\Http\Controllers\Backoffice\ProfileController;
use App\Http\Controllers\Backoffice\ProfilePasswordController;
use Illuminate\Support\Facades\Route;

/**
 * routing backoffice
 */
Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => ['auth']], function() {

    /**
     * routing for dashboard page
     * url : dashboard
     * name : dashboard.index
     * middleware : auth
     */
    Route::get('/', function(){
        return view('dashboard.index');
    })->name('index');

    /**
     * routing for generate slug on dashboard posts crud using fetchapi method js
     * url : dashboard/posts/checkSlug
     * name : dashboard.checkSlug
     * middleware : auth
     */
    Route::get('/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->name('checkSlug');

    /**
     * routing posts crud
     * url : dashboard/posts/*
     * name : dashboard.posts.*
     * middleware : auth
     */
    Route::resource('/posts', DashboardPostController::class);
    
    /**
     * routing categories crud
     * url : dashboard/categories/*
     * name : dashboard.categories.*
     * middleware : ['auth', 'admin']
     */
    Route::resource('/categories', AdminCategoryController::class)->except('show')->middleware('admin');

    /**
     * routing manage profile purpose
     * url : dashboard/profile/*
     * name : dashboard.profile.*
     * middleware : auth
     */
    Route::get('/profile/{user:username}', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile/{user:username}', [ProfileController::class, 'update'])->name('profile.update');

    /**
     * routing change password
     * url : dashboard/profile/password/*
     * name : dashboard.profile.password.*
     * middleware : auth
     */
    Route::get('/profile/{user:username}/password', [ProfilePasswordController::class, 'index'])->name('profile.password.index');
    Route::put('/profile/{user:username}/password', [ProfilePasswordController::class, 'update'])->name('profile.password.update');
});
