<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;

class HomeController extends Controller
{
    public function index()
    {
        // return News::where('publish_status', 1)->where('is_highlight', 1)->orderBy('updated_at', 'DESC')->take(5)->get()->author->name;
        return view('frontend.home', [
            'news' => News::where('publish_status', 1)->orderBy('published_at', 'DESC')->paginate(9),
            'newsHighlight' => News::where('publish_status', 1)->where('is_highlight', 1)->orderBy('published_at', 'DESC')->take(5)->get(),
            'title' => "Home",
        ]);
    }
}
