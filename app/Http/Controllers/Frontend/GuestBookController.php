<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\GuestBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuestBookController extends Controller
{
    public function index()
    {
        return view('frontend.guest-book',[
            'title' => 'Guest Book',
            'guest_comments' => GuestBook::get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'gender' => ['required', 'in:male,female'],
            'age' => ['required', 'numeric'],
            'phone_number' => ['required', 'numeric', 'regex:/[0-9]{10}/'],
            'email' => ['required', 'email'],
            'message' => ['required'],
        ]);

        try {
            DB::beginTransaction();
            GuestBook::create([
                'name' => $request->name,
                'gender' => $request->gender,
                'age' => $request->age,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'message' => $request->message,
                'rating' => 5,
            ]);
            DB::commit();

            return back()->with('success', 'Your message stored succesfully.');
        } catch (\Throwable $th) {
            DB::rollBack();
            //throw $th;

            return back()->with('error', 'Something went wrong.');
        }
    }
}
