<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Tüm kitapları listelemek için
    public function index()
    {
        $books = Book::all(); // Veritabanındaki tüm kitapları çek
        return view('admin.hobby.book.index', compact('books')); // View'a gönder
    }

    // Yeni kitap oluşturma formu
    public function create()
    {
        $turler = ['Aksiyon', 'Dram', 'Komedi', 'Bilim Kurgu', 'Korku'];
        return view('admin.hobby.book.create', compact('turler'));
    }


    // Yeni kitabı veritabanına kaydetme
    public function store(Request $request)
    {
        $request->validate([
            'kitap_adi' => 'required|string|max:255',
            'yazar' => 'required|string|max:255',
            'tur' => 'required|string',
            'sayfa_sayisi' => 'required|integer|min:1',
            'aciklama' => 'nullable|string',
        ]);

        Book::create($request->all());

        return redirect()->route('books.index')->with('success', 'Kitap başarıyla eklendi!');
    }

    // Kitap silme işlemi
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Kitap başarıyla silindi.');
    }

    // Kitap güncelleme formu
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('admin.hobby.book.edit', compact('book'));
    }

    // Kitap güncelleme işlemi
    public function update(Request $request, $id)
    {
        $request->validate([
            'kitap_adi' => 'required|string|max:255',
            'yazar' => 'required|string|max:255',
            'tur' => 'required|string',
            'sayfa_sayisi' => 'required|integer|min:1',
            'aciklama' => 'nullable|string',
        ]);

        $book = Book::findOrFail($id);

        $book->kitap_adi = $request->input('kitap_adi');
        $book->yazar = $request->input('yazar');
        $book->tur = $request->input('tur');
        $book->sayfa_sayisi = $request->input('sayfa_sayisi');
        $book->aciklama = $request->input('aciklama');

        $book->save();

        return redirect()->route('books.index')->with('success', 'Kitap başarıyla güncellendi.');
    }
}
