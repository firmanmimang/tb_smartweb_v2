<?php

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

// list routing backoffice
require __DIR__.'/web-routes/backoffice.php';
// list routing auth
require __DIR__.'/web-routes/auth.php';
// list routing frontend
require __DIR__.'/web-routes/frontend.php';

// Route::get('info', function(){
//     return view('info');
// });

// Route::get('log', function(){
//     Log::channel('log')->info('This is testing for codecheef.org!');
// });

