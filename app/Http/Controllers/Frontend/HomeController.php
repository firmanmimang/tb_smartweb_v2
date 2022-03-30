<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.home', [
            'news' => News::where('publish_status', 1)->paginate(9),
            'newsHighlight' => News::where('publish_status', 1)->where('is_highlight', 1)->orderBy('updated_at', 'DESC')->take(5)->get(),
            'title' => "Home",
        ]);
    }
}
