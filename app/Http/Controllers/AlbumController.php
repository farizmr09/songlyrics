<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;

class AlbumController extends Controller
{
    //
    public function index()
    {
        $albums = Album::paginate(10);
        return $albums;
    }

    public function show(Album $album)
    {
        error_log("di sini?");
        return $album;
    }

    public function store(Request $request)
    {
        $album = Album::create($request->all());

        return response()->json($album, 201);
    }

    public function update(Request $request, Album $album)
    {
        $album->update($request->all());

        return response()->json($album, 200);
    }

    public function delete(Request $request, Album $album)
    {
        $album->delete();

        return response()->json(null, 204);
    }
}
