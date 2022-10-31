<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'release_date'];

    /**
     * an album belongs to an artist
     *
     * @return void
     */
    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }
}
