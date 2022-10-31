<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'lyric'];

    /**
     * A song belong to an artist
     *
     * @return void
     */
    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    /**
     * A song might belong to an album. But it can be null
     *
     * @return void
     */
    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
