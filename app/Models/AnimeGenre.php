<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimeGenre extends Model
{
    use HasFactory;
    protected $table = 'anime_genres';
    public $timestamps = false;

    public function anime() {
        return $this->belongsTo(Anime::class, 'anime_id');
    }
    public function genre() {
        return $this->belongsTo(Genre::class, 'genre_id', 'genre_id');
    }
}
