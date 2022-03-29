<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;

class HomeController extends Controller
{
    public function index()
    {
        // return News::where('publish_status', 1)->where('is_highlight', 1)->take(5)->get();
        return view('frontend.home', [
            'news' => News::where('publish_status', 1)->get(),
            'newsHighlight' => News::where('publish_status', 1)->where('is_highlight', 1)->take(5)->get(),
            'title' => "Home",
        ]);
    }
}
