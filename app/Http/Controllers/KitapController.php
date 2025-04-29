<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class KitapController extends Controller
{
    // Kitapların listelendiği metod
    public function index()
    {
        $books = Book::all();  // Tüm kitapları alıyoruz
        return view('panel.layout.hobby2.kitapListele', compact('books'));  // Blade dosyasına gönderiyoruz
    }

    // Kitap eklemek için formu gösteren metod
    public function create()
    {
        return view('panel.layout.hobby2.kitapEkle');
    }

    // Kitap ekleme işlemi
    public function store(Request $request)
    {
        $request->validate([
            'kitap_adi' => 'required|string|max:255',
            'yazar' => 'required|string|max:255',
            'tur' => 'required|string|max:255',
            'sayfa_sayisi' => 'required|integer',
            'aciklama' => 'nullable|string',
        ]);

        Book::create($request->all());  // Kitap ekliyoruz

        return redirect()->route('books.index')->with('success', 'Kitap başarıyla eklendi.');
    }

    // Kitap düzenleme için formu gösteren metod
    public function edit($id)
    {
        $book = Book::findOrFail($id);  // Kitap buluyoruz
        return view('panel.layout.hobby2.kitapGuncelle', compact('book'));
    }

    // Kitap güncelleme işlemi
    public function update(Request $request, $id)
    {
        $request->validate([
            'kitap_adi' => 'required|string|max:255',
            'yazar' => 'required|string|max:255',
            'tur' => 'required|string|max:255',
            'sayfa_sayisi' => 'required|integer',
            'aciklama' => 'nullable|string',
        ]);

        $book = Book::findOrFail($id);  // Kitap buluyoruz
        $book->update($request->all());  // Kitap güncelliyoruz

        return redirect()->route('books.index')->with('success', 'Kitap başarıyla güncellendi.');
    }

    // Kitap silme işlemi
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();  // Kitap siliyoruz

        return redirect()->route('books.index')->with('success', 'Kitap başarıyla silindi.');
    }


}
