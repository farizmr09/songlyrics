<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;


    // artist_index is first letter of the artist name. Stored in Capital
    protected $fillable = ['artist_name', 'artist_index'];

    /**
     * An artis can have 0 or more song
     *
     * @return void
     */
    public function song()
    {
        return $this->hasMany(Song::class);
    }
}
