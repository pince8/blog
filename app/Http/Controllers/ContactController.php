<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact; // Contact modelini kullanmamız gerekiyor

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::first();
        return view('admin.contact.index', compact('contact'));
    }

    public function edit()
    {
        $contact = Contact::first(); // önce contact'ı al
        return view('admin.contact.edit', compact('contact')); // sonra view'e gönder
    }



    public function update(Request $request, $id)
    {
        // Veriyi doğrulama
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:18',
            'address' => 'required|string|max:255',
            'linkedin' => 'required|url',
            'github' => 'required|url',
        ]);

        // Mevcut kaydı ID ile al
        $contact = Contact::find($id);

        if ($contact) {
            // Veriyi güncelle
            $contact->update($validatedData);
        } else {
            // Eğer kayıt bulunmazsa yeni bir kayıt oluştur
            Contact::create($validatedData);
        }

        return redirect()->route('contact.index')->with('success', 'İletişim bilgileri başarıyla güncellendi.');
    }


}
