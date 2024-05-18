<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function animepage() {
        return view('anime');
    }
    public function loginpage() {
        return view('login');
    }
    public function settings() {
        return view('settings');
    }
}