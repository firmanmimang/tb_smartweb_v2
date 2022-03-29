<?php

use App\Http\Controllers\Backoffice\AdminNewsController;
use App\Http\Controllers\Backoffice\AdminCategoryController;
use App\Http\Controllers\Backoffice\AdminUserController;
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
    // -----------------------------------------

    /**
     * routing for generate slug on dashboard posts crud using fetchapi method js
     * url : dashboard/posts/checkSlug
     * name : dashboard.checkSlug
     * middleware : auth
     */
    Route::get('/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->name('checkSlug');
    // --------------------------------------------

    /**
     * routing posts crud
     * url : dashboard/posts/*
     * name : dashboard.posts.*
     * middleware : auth
     */
    Route::resource('/posts', DashboardPostController::class);
    // ---------------------------------------------

    // routing for change is highlight news, name : dashboard.posts.highlight
    Route::put('/posts/highlight/{news}', [DashboardPostController::class, 'changeIsHighlight'])->name('posts.highlight');
    // -----------------------------------------------

    // group routing has middleware auth and admin
    Route::group(['middleware' => ['admin']], function() 
    {
        /**
         * routing categories crud
         * url : dashboard/categories/*
         * name : dashboard.categories.*
         * middleware : ['auth', 'admin']
         */
        Route::resource('/categories', AdminCategoryController::class)->except('show');
        // ----------------------------------------------------------

        /**
         * routing categories users
         * url : dashboard/users/*
         * name : dashboard.users.*
         * middleware : ['auth', 'admin']
         */
        Route::resource('/users', AdminUserController::class)->except('show');
        // -----------------------------------------------------------

        /**
         * routing admin posts menu
         * url : dashboard/admin/posts*
         * name : dashboard.admin.posts.*
         * middleware : ['auth', 'admin']
         */
        Route::get('/admin/posts', [AdminNewsController::class, 'index'])->name('admin.posts.index');
        // change highlight
        // Route::put('/admin/posts/highlight/{news}', [AdminNewsController::class, 'changeIsHighlight'])->name('admin.posts.highlight');
    });
    // -------------------------------------------------

    /**
     * routing for users crud
     * url : dashboard/profile/password/*
     * name : dashboard.profile.password.*
     * middleware : auth
     */
    Route::resource('/categories', AdminCategoryController::class)->except('show')->middleware('admin');
    // --------------------------------------------------

    /**
     * routing manage profile purpose
     * url : dashboard/profile/*
     * name : dashboard.profile.*
     * middleware : auth
     */
    Route::get('/profile/{user:username}', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile/{user:username}', [ProfileController::class, 'update'])->name('profile.update');
    // ---------------------------------------------------

    /**
     * routing change password
     * url : dashboard/profile/password/*
     * name : dashboard.profile.password.*
     * middleware : auth
     */
    Route::get('/profile/{user:username}/password', [ProfilePasswordController::class, 'index'])->name('profile.password.index');
    Route::put('/profile/{user:username}/password', [ProfilePasswordController::class, 'update'])->name('profile.password.update');
    // -------------------------------------------------------


});
