<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    //
    protected $fillable = [
        "judul",
        "sinopsis",
        "tahun_terbit",
        "image",
        "author_id",
        "genre_id",
    ];

    public function author(){
        return $this->belongsTo(Authors::class);
    }

    public function genre(){
        return $this->belongsTo(Genres::class);
    }
}
