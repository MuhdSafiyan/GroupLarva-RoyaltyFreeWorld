<?php

namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
    $search = $request->search;

    $query = Music::query();

    if ($search) {
        $query->where('title', 'LIKE', "%{$search}%")
              ->orWhere('artist', 'LIKE', "%{$search}%");
    }

    $musics = $query->get();

    return view('music.index', compact('musics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('music.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'      => 'required',
            'artist'     => 'required',
            'genre'      => 'required',
            'music_file' => 'required|file|mimes:mp3,wav|max:20480',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $data = $request->except(['music_file', 'image_file']);
        $data['user_id'] = auth()->id();
//album
        if ($request->hasFile('image_file')) {
            $imageName = time() . '_' . $request->file('image_file')->getClientOriginalName();
            $request->file('image_file')->move(public_path('image_files'), $imageName);
            $data['image_file'] = $imageName;
        }
//music
        if ($request->hasFile('music_file')) {
            $musicName = time() . '_' . $request->file('music_file')->getClientOriginalName();
            $request->file('music_file')->move(public_path('music_files'), $musicName);
            $data['music_file'] = $musicName;
        }

        Music::create($data);

        return redirect('/music');
    }

    /**
     * Display the specified resource.
     */
    public function show(Music $music)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Music $music)
    {
        return view('music.edit', compact('music'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Music $music)
    {
        $data = $request->validate([
            'title'      => 'required',
            'artist'     => 'required',
            'genre'      => 'required',
            'music_file' => 'nullable|file|mimes:mp3|max:20480',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);
//Music
        if ($request->hasFile('music_file')) {
            if ($music->music_file && file_exists(public_path('audio_files/' . $music->music_file))) {
                unlink(public_path('audio_files/' . $music->music_file));
            }
            $musicFile = $request->file('music_file');
            $musicFileName = time() . '_audio.' . $musicFile->getClientOriginalExtension();
            $musicFile->move(public_path('audio_files'), $musicFileName);
            $data['music_file'] = $musicFileName;
        }
//Album
        if ($request->hasFile('image_file')) {
            if ($music->image_file && file_exists(public_path('image_files/' . $music->image_file))) {
                unlink(public_path('image_files/' . $music->image_file));
            }
            $imageFile = $request->file('image_file');
            $imageFileName = time() . '_img.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('image_files'), $imageFileName);
            $data['image_file'] = $imageFileName;
        }

        $music->update($data);

        return redirect('/music');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Music $music)
    {
        // Pilihan: Padam fail fizikal jika perlu
        if ($music->music_file && file_exists(public_path('audio_files/' . $music->music_file))) {
            unlink(public_path('audio_files/' . $music->music_file));
        }
        if ($music->image_file && file_exists(public_path('image_files/' . $music->image_file))) {
            unlink(public_path('image_files/' . $music->image_file));
        }

        $music->delete();
        return redirect('/music');
    }
}
