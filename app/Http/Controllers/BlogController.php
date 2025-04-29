<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    // Blogları listeleme
    public function index()
    {
        $blogs = Blog::all();  // Tüm blogları alıyoruz (İsteğe bağlı olarak kullanıcıya özel filtreleme ekleyebilirsiniz)
        return view('admin.blog.index', compact('blogs'));
    }

    // Blog oluşturma sayfası
    public function create()
    {
        return view('admin.blog.create');
    }

    // Blog yazısını kaydetme
    public function store(Request $request)
    {
        // Form doğrulaması
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Resim doğrulaması
        ]);

        // Resim yükleme işlemi
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blogs', 'public');
        }

        // Blog yazısını kaydetme
        Blog::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
        ]);

        return redirect()->route('blog.index')->with('success', 'Blog yazısı başarıyla kaydedildi.');
    }

    // Blog detay sayfası
    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blog.show', compact('blog'));
    }

    // Blog düzenleme sayfası
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blog.edit', compact('blog'));
    }

    // Blog güncelleme
    public function update(Request $request, $id)
    {
        // Blogu bulma
        $blog = Blog::findOrFail($id);

        // Form doğrulaması
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Resim doğrulaması
        ]);

        // Mevcut resim dosyasını kontrol et
        $imagePath = $blog->image;
        if ($request->hasFile('image')) {
            // Eski resim dosyasını silme
            if ($imagePath && Storage::exists('public/' . $imagePath)) {
                Storage::delete('public/' . $imagePath);
            }

            // Yeni resim yükleme
            $imagePath = $request->file('image')->store('blogs', 'public');
        }

        // Blogu güncelleme
        $blog->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
        ]);

        return redirect()->route('blog.index')->with('success', 'Blog yazısı başarıyla güncellendi.');
    }

    // Blog silme
    public function destroy($id)
    {
        // Blogu bulma
        $blog = Blog::findOrFail($id);

        // Blogun resmini silme (varsa)
        if ($blog->image && Storage::exists('public/' . $blog->image)) {
            Storage::delete('public/' . $blog->image);
        }

        // Blogu silme
        $blog->delete();

        // Başarı mesajı ile yönlendirme
        return redirect()->route('blog.index')->with('success', 'Blog başarıyla silindi.');
    }
}
