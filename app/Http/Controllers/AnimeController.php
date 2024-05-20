<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use Illuminate\Http\Request;

class AnimeController extends Controller
{
    public function showAnime(Anime $anime) {
        return view('anime', compact('anime'));
        // return $anime->title;
    }
}
