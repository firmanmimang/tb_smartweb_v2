<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\User;

class SearchController extends Controller
{
    public function index()
    {
        $title = '';
        if(request('category')){
            $category = Category::where('slug', request('category'))->firstOrFail();
            $title = 'in '. $category->name. ' Category';
        }

        if(request('author')){
            $author = User::where('username', request('author'))->firstOrFail();
            $title = 'by '. $author->name;
        }

        return view('frontend.search', [
            'title' => 'Searching News '. $title,
            'news' => News::latest()->filter(request(['search', 'category', 'author']))->paginate(12)->withQueryString()
        ]);
    }
}
