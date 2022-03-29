<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsDetailController extends Controller
{
    public function index(News $news)
    {
        return view('frontend.news-detail', [
            'news' => $news,
            'title' => $news->title,
        ]);
    }
}
