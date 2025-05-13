<?php
// app/Http/Controllers/MusicController.php

namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    public function index()
    {
        $musicList = Music::all(); // Tüm müzikleri al
        return view('admin.hobby.music.index', compact('musicList')); // Değişkeni gönder
    }


    public function create()
    {
        return view('admin.hobby.music.create');
    }

    public function store(Request $request)
    {
        // Türlerin doğrulaması
        $request->validate([
            'name' => 'required|string|max:255',
            'singer' => 'required|string|max:255',
            'rating' => 'required|numeric|min:0|max:10',
            'status' => 'required|boolean',
            'genre' => 'required|in:Rock,Pop,Jazz,Classical,Hip-Hop', // İzin verilen müzik türleri
        ]);

        // Müzik verisinin kaydedilmesi
        Music::create($request->all());

        return redirect()->route('music.index')->with('success', 'Müzik başarıyla eklendi!');
    }


    public function edit($id)
    {
        $music = Music::findOrFail($id);
        return view('admin.hobby.music.edit', compact('music'));
    }

    public function update(Request $request, $id)
    {
        // Türlerin doğrulaması
        $request->validate([
            'name' => 'required|string|max:255',
            'singer' => 'required|string|max:255',
            'rating' => 'required|numeric|min:0|max:10',
            'status' => 'required|boolean',
            'genre' => 'required|in:Rock,Pop,Jazz,Classical,Hip-Hop', // İzin verilen müzik türleri
        ]);

        // Müzik verisinin güncellenmesi
        $music = Music::findOrFail($id);
        $music->update($request->all());

        return redirect()->route('music.index')->with('success', 'Müzik başarıyla güncellendi!');
    }


    public function destroy($id)
    {
        $music = Music::findOrFail($id);
        $music->delete();

        return redirect()->route('music.index')->with('success', 'Müzik başarıyla silindi!');
    }
}

