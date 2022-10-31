<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;



class SongController extends Controller
{

    //
    //
    public function index()
    {
        $songs = Song::paginate(10);
        return $songs;
    }

    public function show(Song $song)
    {
        error_log("di sini?");
        return $song;
    }

    public function store(Request $request)
    {
        $song = Song::create($request->all());

        return response()->json($song, 201);
    }

    public function update(Request $request, Song $song)
    {
        $song->update($request->all());

        return response()->json($song, 200);
    }

    public function delete(Request $request, Song $song)
    {
        $song->delete();

        return response()->json(null, 204);
    }
}
