<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //
    public function register(Request $request) {
        $incomingFields = $request->validate([
            'username' => ['required', 'min:3', 'max:12', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'confirmed']
        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);

        User::create($incomingFields);

        return redirect('/login')->with('success', "Successfully created account.");
    }

    public function login(Request $request) {
        $incomingFields = $request->validate([
            'loginUserMail' => 'required',
            'loginUserPassword' => 'required'
        ]);
        if(auth()->attempt([
            'email' => $incomingFields['loginUserMail'],
            'password' => $incomingFields['loginUserPassword']
        ])) {
            Session::put('user_id', auth()->user()->user_id);
            $request->session()->regenerate();
            $username = auth()->user()->username;
            return redirect("/user/$username/overview")->with('success', 'You have successfully logged in.');
        }
        else {
            return redirect('/login')->with('failure', 'Invalid login attempt.');
        }
    }
    public function showCorrectHomepage(Request $request) {
        if(auth()->check()) {
            $username = auth()->user()->username;
            return redirect("/user/$username/overview");
        }
        else {
            return view('homepage');
        }
    }
    public function logout() {
        auth()->logout();
        return redirect('/')->with('success', 'You are now logged out.');
    }
    public function redirectOverview(User $user) {
        // if(auth()->check()) 
        $followStatus = 0;

        $followStatus = Follow::where([
            ['user_id', '=', auth()->user()->user_id],
            ['following_id', '=', $user->user_id]
        ])
        ->count();

        return view('overview', [
            'profilePhoto' => $user->profilePhoto,
            'username' => $user->username, 
            'profileCover' => $user->profileCover,
            'followStatus' => $followStatus
        ]);
    }
    public function favorites(User $user) {
        $followStatus = 0;

        $followStatus = Follow::where([
            ['user_id', '=', auth()->user()->user_id],
            ['following_id', '=', $user->user_id]
        ])
        ->count();
        return view('favorites', [
            'profilePhoto' => $user->profilePhoto,
            'username' => $user->username, 
            'profileCover' => $user->profileCover,
            'followStatus' => $followStatus
        ]);
    }
    public function animeList(User $user) {
        $followStatus = 0;
        $followStatus = Follow::where([
            ['user_id', '=', auth()->user()->user_id],
            ['following_id', '=', $user->user_id]
        ])
        ->count();
        return view('anime_list', [
            'profilePhoto' => $user->profilePhoto,
            'username' => $user->username, 
            'profileCover' => $user->profileCover,
            'followStatus' => $followStatus
        ]);
    }
}