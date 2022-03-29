<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsDetailController extends Controller
{
    public function index(News $news)
    {
        // return array_chunk(Category::get(['name', 'slug'])->toArray(), 2);
        return view('frontend.news-detail', [
            'news' => $news,
            'title' => $news->title,
        ]);
    }
}
