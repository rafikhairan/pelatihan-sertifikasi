<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::where('id', auth()->user()->id)->first();

        if(!$user->is_admin) {
            return view('web.profile', compact('user'));
        }

        return view('profile.index', compact('user'));
    }

    public function changePassword()
    {
        $user = User::where('id', auth()->user()->id)->first();

        if(!$user->is_admin) {
            return view('web.change_password', compact('user'));
        }

        return view('profile.change_password');
    }

    public function update(Request $request)
    {
        $request->validate([
            'username' => 'unique:users,username,'.auth()->user()->id,
            'email' => 'unique:users,email,'.auth()->user()->id,
            'password' => 'confirmed'
        ]);

        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'address' => $request->address,
        ];

        if($request->file('photo')) {
            $photo = explode('.', $request->file('photo')->getClientOriginalName())[0];
            $photo = $photo . '-' . time() . '.' . $request->file('photo')->extension();
            $request->file('photo')->storeAs('public/uploads/profile', $photo);
            $data['photo'] = 'profile/' . $photo;
        }

        User::where('id', auth()->user()->id)->update($data);

        return redirect('/profile')->with('success', 'Profile has been updated.');
    }

    public function updatePassword(Request $request)
    {
        $match = Hash::check($request->old_password, auth()->user()->password);

        if (!$match) {
            return redirect('/profile/change-password')->with('failed', 'Old password you entered is incorrect.');
        }

        $request->validate([
            'new_password' => 'confirmed'
        ]);

        User::where('id', auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect('/profile')->with('success', 'Password has been changed.');
    }
}
