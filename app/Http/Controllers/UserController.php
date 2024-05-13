<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
        return 'Hello from register';
    }

    public function login(Request $request) {
        $incomingFields = $request->validate([
            'loginUserMail' => 'required',
            'loginUserPassword' => 'required'
        ]);
        if(\auth()->attempt([
            'email' => $incomingFields['loginUserMail'],
            'password' => $incomingFields['loginUserPassword']
        ])) {
            $request->session()->regenerate();
            return view('anime');
        }
        else {
            return 'Sorry!!';
        }
    }
    public function showCorrectHomepage() {
        if(auth()->check()) {
            return 'You are logged in';
        }
        else {
            return view('homepage');
        }
    }
}
