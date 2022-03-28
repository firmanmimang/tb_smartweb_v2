<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.home', [
            'news' => News::where('publish_status', 1)->get(),
        ]);
    }
}
