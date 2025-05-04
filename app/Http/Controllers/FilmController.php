<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{

    public function index()
    {
        $films = Film::all(); // Veritabanındaki tüm filmleri çek
        return view('admin.hobby.film.index', compact('films')); // View'a gönder

    }
    public function create() {
        return view('admin.hobby.film.create');
    }

    public function store(Request $request) {
        $request->validate([
            'film_adi' => 'required|string|max:255',
            'yonetmen' => 'required|string|max:255',
            'tur' => 'required|string',
            'puan' => 'required|numeric|min:1|max:10',
            'aciklama' => 'nullable|string',
        ]);

        Film::create($request->all());

        return redirect()->route('films.index')->with('success', 'Film başarıyla eklendi!');
    }


    public function destroy($id)
    {
        $film = Film::findOrFail($id); // ID'ye göre filmi bul
        $film->delete();  // Silme işlemi

        return redirect()->route('films.index')->with('success', 'Film başarıyla silindi.');
    }

    public function edit($id)
    {
        // ID'ye göre filmi bul
        $film = Film::findOrFail($id);

        // Film bilgilerini güncelleme formuna gönder
        return view('admin.hobby.film.edit', compact('film'));
    }

    public function update(Request $request, $id)
    {
        // Film verilerini doğrula
        $request->validate([
            'film_adi' => 'required|string|max:255',
            'yonetmen' => 'required|string|max:255',
            'tur' => 'required|string|max:255',
            'puan' => 'required|numeric|min:0|max:10', // Puan 0 ile 10 arasında olmalı
            'aciklama' => 'nullable|string', // Açıklama isteğe bağlı

        ]);

        // Film kaydını bul
        $film = Film::findOrFail($id);

        // Film verilerini güncelle
        $film->film_adi = $request->input('film_adi');
        $film->yonetmen = $request->input('yonetmen');
        $film->tur = $request->input('tur');
        $film->puan = $request->input('puan');
        $film->aciklama = $request->input('aciklama');

        $film->save();

        // Başarı mesajı ile anasayfaya geri dön
        return redirect()->route('films.index')->with('success', 'Film başarıyla güncellendi.');
    }


}
