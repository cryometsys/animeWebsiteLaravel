<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function changePhoto(Request $request) {
        $request->validate([
            'profilePhoto' => 'required|image'
        ]);
        $user = auth()->user();
        $fileName = $user->user_id . '-' . uniqid() . '.jpg';
        $request->file('profilePhoto')->storeAs('public/profilePhotos', $fileName);
        $oldPhoto = $user->profilePhoto;
        $user->profilePhoto = $fileName;
        $user->save();
        if($oldPhoto != "/default-photo.jpg") {
            Storage::delete(str_replace("/storage/", "public/", $oldPhoto));
        }
        return redirect()->back()->with('success', 'Profile photo updated successfully.');
    }
    public function changeCover(Request $request) {
        $request->validate([
            'profileCover' => 'required|image'
        ]);
        $user = auth()->user();
        $fileName = $user->user_id . '-' . uniqid() . '.jpg';
        $request->file('profileCover')->storeAs('public/profileCover', $fileName);
        $oldCover = $user->profileCover;
        $user->profileCover = $fileName;
        $user->save();
        if($oldCover != "/default-cover.jpg") {
            Storage::delete(str_replace("/storage/", "public/", $oldCover));
        }
        return redirect()->back()->with('success', 'Profile cover updated successfully.');
    }

    public function updateUsername(Request $request) {
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users,username,' . auth()->user()->id],
        ]);
        if ($request->username === auth()->user()->username) {
            return redirect()->back()->with('error', 'Username is the same as the current one.');
        }
        auth()->user()->update(['username' => $request->username]);
        return redirect()->back()->with('success', 'Username updated successfully.');
    }
    public function updateEmail(Request $request) {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . auth()->user()->id],
        ]);
        if ($request->email === auth()->user()->email) {
            return redirect()->back()->with('error', 'Email is the same as the current one.');
        }
        auth()->user()->update(['email' => $request->email]);
        return redirect()->back()->with('success', 'Email updated successfully.');
    }

    public function updatePassword(Request $request) {
        $request->validate([
            'current_password' => ['required', 'password'],
            'new_password' => ['required', 'confirmed', 'different:current_password'],
        ]);
        if (Hash::check($request->new_password, auth()->user()->password)) {
            return redirect()->back()->with('error', 'New password cannot be the same as the current password.');
        }
        auth()->user()->update(['password' => Hash::make($request->new_password)]);
        return redirect()->back()->with('success', 'Password updated successfully.');
    }

}
