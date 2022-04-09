<?php

use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('scrape/{count?}', function ($count = 20) {
    $returnData = Artisan::call("scrape --count=$count");
    $returnData == 1 ? $message = "Success." : $message = "Fail.";

    return $message;
})->middleware(['auth', IsAdmin::class]);

// list routing backoffice
require __DIR__ . '/web-routes/backoffice.php';
// list routing auth
require __DIR__ . '/web-routes/auth.php';
// list routing frontend
require __DIR__ . '/web-routes/frontend.php';

// Route::get('info', function()
// {
//     return view('info');
// });

// Route::get('log', function()
// {
//     Log::channel('log')->info('This is testing for codecheef.org!');
// });
