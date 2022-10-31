<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;

class ArtistController extends Controller
{
    //
    public function index()
    {
        $artists = Artist::paginate(10);
        return $artists;
    }

    public function show(Artist $artist)
    {
        error_log("di sini?");
        return $artist;
    }

    public function store(Request $request)
    {
        $artist = Artist::create($request->all());

        return response()->json($artist, 201);
    }

    public function update(Request $request, Artist $artist)
    {
        $artist->update($request->all());

        return response()->json($artist, 200);
    }

    public function delete(Request $request, Artist $artist)
    {
        $artist->delete();

        return response()->json(null, 204);
    }
}
