<?php

use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\GuestBookController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\NewsDetailController;
use App\Http\Controllers\Frontend\SearchController;
use App\Http\Controllers\PostController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

// homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// about us
Route::get('/about', [AboutController::class, 'index'])->name('about');

// guest book
Route::get('/guest-book', [GuestBookController::class, 'index'])->name('guest.book');

// search news purpose
Route::get('/search', [SearchController::class, 'index'])->name('search');

// comment post on news detail middleware auth
Route::post('{news:slug}', [NewsDetailController::class, 'storeComment'])->name('news.store.comment')->middleware('auth');

// news detail
Route::get('{news:slug}', [NewsDetailController::class, 'index'])->name('news.detail');


// Route::get('/blog', [PostController::class, 'index']);

// // news detail
// Route::get('/posts/{post:slug}', [PostController::class, 'show']);

// // show all categories
// Route::get('/categories', function(){
//     return view('categories',[
//         'title' => 'Post Categories',
//         'active' => 'categories',
//         'categories' => Category::all()
//     ]);
// });
