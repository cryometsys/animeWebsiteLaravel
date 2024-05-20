<?php

namespace App\Http\Controllers;

use App\Models\AnimeGenre;
use App\Models\User;
use App\Models\Anime;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function addAnime(Request $request) {
        // Validate the input data
        $validatedData = $request->validate([
            'title' => 'required|string',
            'synopsis' => 'required|string',
            'airing_season' => 'required|string',
            'airing_year' => 'required|integer',
            'airing_date' => 'required|date_format:Y-m-d',
            'ending_date' => 'required|date_format:Y-m-d',
            'duration' => 'required|string',
            'episodes' => 'required|integer',
            'status' => 'required|string',
            'studio' =>'required|string',
            'genre' => 'required|string',
            'format' => 'required|string'
            // 'animePhoto' => 'required|image'
        ]);

        $anime = new Anime;
        $anime->title = $validatedData['title'];
        $anime->synopsis = $validatedData['synopsis'];
        $anime->airing_season = $validatedData['airing_season'];
        $anime->airing_year = $validatedData['airing_year'];
        $anime->airing_date = $validatedData['airing_date'];
        $anime->ending_date = $validatedData['ending_date'];
        $anime->episodes = $validatedData['episodes'];
        $anime->status = $validatedData['status'];
        $anime->studio = $validatedData['studio'];
        $anime->animeDuration = $validatedData['duration'];
        $anime->format = $validatedData['format'];

        $fileName = $anime->title . '.jpg';
        $request->file('animeCover')->storeAs('public/animeCover', $fileName);
        $oldCover = $anime->animeCover;
        $anime->animeCover = $fileName;
        if($oldCover != null) {
            Storage::delete(str_replace("/storage/", "public/", $oldCover));
        }
        $genreNames = explode('/', $validatedData['genre']);
        $genres = [];
        foreach ($genreNames as $genreName) {
            $genre = Genre::where('genre_name', $genreName)->first();
            if (!$genre) {
                $genre = new Genre;
                $genre->genre_name = $genreName;
                $genre->save();
            }
            $genres[] = $genre;
        }
        $anime->save();
        foreach ($genres as $genre) {
            $animeGenre = new AnimeGenre;
            $animeGenre->anime_id = $anime->anime_id;
            $animeGenre->genre_id = $genre->genre_id;
            $animeGenre->save();
        }
        // dd($anime, $genres);
        return redirect('/admin/animes')->with('success', 'Anime added successfully!');
    }
    public function index() {
        $totalAnimes = Anime::count();
        // $genreCounts = Genre::withCount('animes')->get();
        $totalUsers = User::count();

        return view('admin.admin-overview', compact(
            'totalAnimes', 
            // 'genreCounts', 
            'totalUsers'));
    }
    public function viewAnimes() {
        $animes = Anime::all();
        $animesWithGenres = [];
        foreach ($animes as $anime) {
            $animeGenres = AnimeGenre::where('anime_id', $anime->anime_id)->get();
            $genres = $animeGenres->load('genre')->pluck('genre.genre_name')->toArray();
            $animesWithGenres[$anime->anime_id] = $genres;
        }
        return view('admin.view-animes', compact('animes', 'animesWithGenres'));
        
    }
    public function createAnime() {
        return view('admin.create-anime');
    }
    public function editAnime(Anime $anime) {
        // return view('admin.edit-anime', compact('anime'));
        return redirect()->back();
    }
    public function updateAnime(Request $request, Anime $anime) {
        // Handle anime update logic
    }
    public function destroyAnime($animename) {
        $anime = Anime::where('title', $animename)->first();
        if($anime) {
            $anime->delete();
            return redirect()->back()->with('success', 'Anime deleted successfully.');
        }
        else return redirect()->back()->with('failure', 'Anime does not exist.');
    }
    public function viewUsers() {
        $users = User::all();
        return view('admin.view-users', compact('users'));
    }
    public function viewAdmins() {
        $admins = User::where('isadmin', 1)->get();
        return view('admin.view-admins', compact('admins'));
    }
    public function deleteUser($username) {
        $user = User::where('username', $username)->first();
        if ($user) {
            $user->delete();
            return redirect()->back()->with('success', 'User deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'User not found.');
        }
    }
    public function deleteAdmin(User $user) {
        $user->isadmin = 0;
        $user->save();
        return redirect()->back();
    }
}
