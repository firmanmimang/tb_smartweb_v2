<?php

use App\Http\Controllers\Backoffice\AdminCategoryController;
use App\Http\Controllers\Backoffice\DashboardPostController;
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
     * routing for generate slug on posts crud using fetch js
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
});