<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies("users-access"), 403, 'THIS ACTION IS UNAUTHORIZE');

        return view('dashboard.users.index', [
            'users' => User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies("users-create"), 403, 'THIS ACTION IS UNAUTHORIZE');

        return view('dashboard.users.create', [
            'roles' => Role::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_if(Gate::denies("users-store"), 403, 'THIS ACTION IS UNAUTHORIZE');

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255|confirmed',
            'role' => 'required',
        ]);

        try {
            $validatedData['password'] =Hash::make($validatedData['password']);
            
            DB::beginTransaction();
            $user = User::create($validatedData);
            $user->assignRole($validatedData['role']);
            DB::commit();
    
            return redirect()->route('dashboard.users.index')->with('success', 'User created successfully.');
        } catch (\Throwable $th) {
            DB::rollBack();
            //throw $th;

            return redirect()->route('dashboard.users.index')->with('error', 'Something went wrong on creating user.');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        abort_if(Gate::denies("users-edit"), 403, 'THIS ACTION IS UNAUTHORIZE');

        return view('dashboard.users.edit', [
            'roles' => Role::all(),
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        abort_if(Gate::denies("users-update"), 403, 'THIS ACTION IS UNAUTHORIZE');

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users,username,'.$user->id],
            'email' => 'required|email:dns|unique:users,email,'.$user->id,
            'role' => 'required',
        ]);

        try {
            
            DB::beginTransaction();
            $user->update($validatedData);
            $user->syncRoles($validatedData['role']);
            DB::commit();
    
            return redirect()->route('dashboard.users.index')->with('success', 'User updated successfully.');
        } catch (\Throwable $th) {
            DB::rollBack();
            //throw $th;

            return redirect()->route('dashboard.users.index')->with('error', 'Something went wrong on updating user.');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        abort_if(Gate::denies("users-delete"), 403, 'THIS ACTION IS UNAUTHORIZE');

        try {

            if($user->image){
                Storage::delete($user->image);
            }

            DB::beginTransaction();
            $user->delete();
            DB::commit();

            return redirect()->route('dashboard.users.index')->with('success', 'User deleted successfully.');
        } catch (\Throwable $th) {
            DB::rollBack();
            //throw $th;

            return redirect()->route('dashboard.users.index')->with('error', 'Something went wrong on deleting user.');
        }
    }
}
