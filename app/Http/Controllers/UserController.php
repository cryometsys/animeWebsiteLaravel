<?php

namespace App\Http\Controllers;

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
            return redirect('/')->with('success', 'You have successfully logged in.');
        }
        else {
            return redirect('/login')->with('failure', 'Invalid login attempt.');
        }
    }
    public function showCorrectHomepage(Request $request) {
        if(auth()->check()) {
            return view('overview');
        }
        else {
            return view('homepage');
        }
    }
    public function logout() {
        auth()->logout();
        return redirect('/')->with('success', 'You are now logged out.');
    }
}