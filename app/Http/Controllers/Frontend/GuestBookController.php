<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuestBookController extends Controller
{
    public function index()
    {
        return 'guest-book';
    }

    public function store()
    {
        return 'store';
    }
}
