<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class AdminNewsController extends Controller
{
    public function index()
    {
        return view('dashboard.admin-posts.index', [
            'posts' => News::paginate(10),
        ]);
    }
}
