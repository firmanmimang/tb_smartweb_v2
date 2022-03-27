<?php

use App\Http\Controllers\PostController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;


// homepage
Route::get('/', function () {
    return view('home',[
        'title' => 'Home',
        'active' => 'home'
    ]);
});

// about us
Route::get('/about', function () {
    return view('about',[
        'title' => 'About',
        'active' => 'about',
        'name' => 'Firman Hidayat',
        'email' => 'fhidayat131@gmail.com',
        'image' => 'firman.jpg'
    ]);
});


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
