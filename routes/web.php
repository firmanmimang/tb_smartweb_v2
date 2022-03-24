<?php

use App\Http\Controllers\AdminCategoryController;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home',[
        'title' => 'Home',
        'active' => 'home'
    ]);
});

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
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function(){
    return view('categories',[
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});

// sudah ditangani sama /blog
// Route::get('/categories/{category:slug}', function(Category $category){
//     return view('posts',[
//         'title' => "Post by Category : $category->name",
//         'active' => 'categories',
//         'posts' => $category->posts->load('category', 'author')
//     ]);
// });
// Route::get('/author/{author:username}', function(User $author){
//     return view('posts',[
//         'title' => "Post by Author : $author->name",
//         'active' => 'author',
//         'posts' => $author->posts->load('category', 'author')
//     ]);
// });

// auth
Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
//register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => ['auth']], function() {

    Route::get('/', function(){
        return view('dashboard.index');
    })->name('index');

    Route::get('/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->name('checkSlug');

    Route::resource('/posts', DashboardPostController::class);
    
    Route::resource('/categories', AdminCategoryController::class)->except('show')->middleware('admin');
});

