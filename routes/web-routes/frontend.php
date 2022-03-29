<?php

use App\Http\Controllers\Frontend\AboutController;
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
Route::get('/guest-book', function () {
    return view('about',[
        'title' => 'About',
        'active' => 'about',
        'name' => 'Firman Hidayat',
        'email' => 'fhidayat131@gmail.com',
        'image' => 'firman.jpg'
    ]);
})->name('guest.book');

// search news purpose
Route::get('/search', [SearchController::class, 'index'])->name('search');

// news detail
Route::get('news/{news:slug}', [NewsDetailController::class, 'index'])->name('news.detail');


Route::get('/blog', [PostController::class, 'index']);

// news detail
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

// show all categories
Route::get('/categories', function(){
    return view('categories',[
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});
