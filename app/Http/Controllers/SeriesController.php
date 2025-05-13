<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    // Tüm dizileri listelemek için
    public function index()
    {
        $series = Series::all(); // Veritabanındaki tüm dizileri çek
        return view('admin.hobby.series.index', compact('series')); // View'a gönder
    }

    // Yeni dizi oluşturma formu
    public function create()
    {
        return view('admin.hobby.series.create');
    }

    // Yeni diziyi veritabanına kaydetme
    public function store(Request $request)
    {
        $request->validate([
            'series_name' => 'required|string|max:255', // Dizi adı zorunlu
            'director' => 'required|string|max:255', // Yönetmen zorunlu
            'genre' => 'required|string', // Tür zorunlu
            'rating' => 'required|numeric|min:1|max:10', // Puan zorunlu ve 1 ile 10 arasında
            'description' => 'nullable|string', // Açıklama isteğe bağlı
        ]);

        Series::create($request->all()); // Yeni dizi kaydedilir

        return redirect()->route('series.index')->with('success', 'Dizi başarıyla eklendi!');
    }

    // Dizi silme işlemi
    public function destroy($id)
    {
        $series = Series::findOrFail($id); // ID'ye göre diziyi bul
        $series->delete(); // Silme işlemi

        return redirect()->route('series.index')->with('success', 'Dizi başarıyla silindi.');
    }

    // Dizi güncelleme formu
    public function edit($id)
    {
        // Dizi verisini alın
        $dizi = Series::findOrFail($id);

        // Veriyi Blade dosyasına gönder
        return view('admin.hobby.series.edit', compact('dizi'));
    }

    // Diziyi güncelleme işlemi
    public function update(Request $request, $id)
    {
        $request->validate([
            'series_name' => 'required|string|max:255', // Dizi adı zorunlu
            'director' => 'required|string|max:255', // Yönetmen zorunlu
            'genre' => 'required|string|max:255', // Tür zorunlu
            'season' => 'required|numeric|min:0|max:10',
            'rating' => 'required|numeric|min:0|max:10', // Puan zorunlu ve 0 ile 10 arasında
            'description' => 'nullable|string', // Açıklama isteğe bağlı
        ]);

        $series = Series::findOrFail($id); // Diziyi bul

        // Dizi verilerini güncelle
        $series->series_name = $request->input('series_name');
        $series->director = $request->input('director');
        $series->genre = $request->input('genre');
        $series->season = $request->input('season');
        $series->rating = $request->input('rating');
        $series->description = $request->input('description');

        $series->save(); // Güncellenmiş veriyi kaydet

        return redirect()->route('series.index')->with('success', 'Dizi başarıyla güncellendi.');
    }
}
