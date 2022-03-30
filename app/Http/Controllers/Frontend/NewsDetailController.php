<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class NewsDetailController extends Controller
{
    public function index(News $news)
    {
        return view('frontend.news-detail', [
            'news' => $news,
            'title' => $news->title,
            'comments' => $news->comments()->get(),
        ]);
    }

    public function storeComment(Request $request, News $news)
    {
        abort_if(Gate::denies("comment"), 403, 'THIS ACTION IS UNAUTHORIZE');

        $request->validate([
            'comment' => ['required', 'string']
        ]);

        try {
            DB::beginTransaction();
            Comment::create([
                'user_id' => Auth::user()->id,
                'body' => $request->comment,
                'news_id' => $news->id,
                'date' => Carbon::now(),
                'status' => true,
            ]);
            DB::commit();
            
            return back()->with('success', 'comment posted.');
        } catch (\Throwable $th) {
            DB::rollBack();
            // throw $th;

            return back()->with('error', 'something went wrong on posting comment.');
        }
    }
}
