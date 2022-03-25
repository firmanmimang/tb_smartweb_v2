<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfilePasswordController extends Controller
{
    public function index(User $user)
    {
        return view('dashboard.profile.password', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required|confirmed',
        ]);

        if(!Auth::attempt(['email' => $user->email, 'password' => $validatedData['oldPassword']])) return back()->with('error', 'Your old passowrd is wrong.');

        try {
            DB::beginTransaction();
            User::where('id', $user->id)->update([
                'password' => bcrypt($validatedData['newPassword']),
            ]);
            DB::commit();

            return redirect()->route('dashboard.profile.index', $user)->with('success', 'Your password has been changed successfuly.');
        } catch (\Throwable $th) {
            DB::rollBack();
            //throw $th;

            return redirect()->route('dashboard.profile.index', $user)->with('error', 'Something went wrong on updating your password.');
        }
    }
}
