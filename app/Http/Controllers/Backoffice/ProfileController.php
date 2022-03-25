<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        return view('dashboard.profile.index', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:191',
            'username' => 'required|unique:users,username,'.$user->id,
            'image' => 'image|file|max:1024',
        ]);

        try {

            if($request->file('image')){
                if($user->image){
                    Storage::delete($user->image);
                }
                $validatedData['image'] = $request->file('image')->store('user-images');
            }

            DB::beginTransaction();
                User::where('id', $user->id)->update($validatedData);
            DB::commit();

            return redirect()->route('dashboard.profile.index', ['user'=> $validatedData['username']])->with('success', 'Profile updated.');
        } catch (\Throwable $th) {
            DB::rollBack();
            //throw $th;

            return redirect()->route('dashboard.profile.index', ['user'=> $validatedData['username']])->with('error', 'Something went wrong on updating.');
        }
    }
}
