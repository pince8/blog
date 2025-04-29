<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        return view('panel.layout.about2.aboutPage', compact('about'));
    }

    public function edit()
    {
        $about = About::first(); // Tek bir kayıt tutuyoruz
        return view('panel.layout.about2.aboutGuncelle', compact('about'));
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'required|string',
            'languages' => 'array',
            'languages.*' => 'string',
            'levels' => 'array',
            'levels.*' => 'string|in:Başlangıç,Orta,İleri',
            'profile_picture' => 'nullable|image|max:2048',
        ]);

        // Dil ve seviyeleri JSON formatına dönüştür
        $languages = [];
        if (!empty($validatedData['languages'])) {
            foreach ($validatedData['languages'] as $index => $lang) {
                $languages[] = [
                    'name' => $lang,
                    'level' => $validatedData['levels'][$index] ?? 'Başlangıç',
                ];
            }
        }

        // Profil fotoğrafı yükleme işlemi
        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $validatedData['profile_picture'] = $path;
        }

        $about = About::first();

        if ($about) {
            $about->update([
                'name' => $validatedData['name'],
                'bio' => $validatedData['bio'],
                'languages' => $languages,
                'profile_picture' => $validatedData['profile_picture'] ?? $about->profile_picture
            ]);
        } else {
            About::create([
                'name' => $validatedData['name'],
                'bio' => $validatedData['bio'],
                'languages' => $languages,
                'profile_picture' => $validatedData['profile_picture'] ?? null
            ]);
        }

        return redirect()->route('about.index')->with('success', 'Hakkımda bilgileri güncellendi.');
    }
}
