<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $request->role !== null ? 1 : 0,
            'address' => $request->address
        ];

        if($request->file('photo')) {
            $photo = explode('.', $request->file('photo')->getClientOriginalName())[0];
            $photo = $photo . '-' . time() . '.' . $request->file('photo')->extension();
            $request->file('photo')->storeAs('public/uploads/profile', $photo);
            $data['photo'] = 'profile/' . $photo;
        }

        User::create($data);

        return redirect('/users')->with('success', 'User successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->checkAdmin($user);

        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->checkAdmin($user);

        $request->validate([
            'username' => 'unique:users,username,'.$user->id,
            'email' => 'unique:users,email,'.$user->id,
            'password' => 'confirmed'
        ]);

        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'is_admin' => $request->role !== null ? 1 : 0,
            'address' => $request->address
        ];

        if ($request->password !== null && $request->confirm_password !== null) {
            $data['password'] = Hash::make($request->password);
        }

        if($request->file('photo')) {
            $photo = explode('.', $request->file('photo')->getClientOriginalName())[0];
            $photo = $photo . '-' . time() . '.' . $request->file('photo')->extension();
            $request->file('photo')->storeAs('uploads/profile', $photo);
            $data['photo'] = 'profile/' . $photo;
        }

        $user->update($data);

        return redirect('/users')->with('success', 'User successfully updated.');
    }

    /** 
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->checkAdmin($user);

        $user->delete();

        return redirect('/users')->with('success', 'User successfully deleted.');
    }

    public function checkAdmin($user)
    {
        if(auth()->user()->username !== 'admin' && $user->is_admin) {
            abort(403);
        }
    }
}
