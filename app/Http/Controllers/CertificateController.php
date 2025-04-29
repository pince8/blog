<?php

namespace App\Http\Controllers;
use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index()
    {
        // Sertifikaları veritabanından çekiyoruz
        $certificates = Certificate::all();

        // Sertifikaları view'a gönderiyoruz
        return view('admin.certification.index', compact('certificates'));
    }

    public function create()
    {
        return view('admin.certification.create');
    }

    public function store(Request $request)
    {
        // Veritabanına veri eklenmeden önce gelen verileri doğrulama
        $request->validate([
            'image' => 'required|file|image|mimes:jpg,png,jpeg,gif|max:10240', // Maksimum 10MB
            'name' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        // Eğer dosya yüklenmişse işlemleri yap
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Resmi public diske kaydet
            $imagePath = $request->file('image')->store('certificates', 'public');

            // Veritabanına eklemek için Certificate modeline veri gönder
            $certificate = new Certificate([
                'image_path' => $imagePath,
                'name' => $request->input('name'),
                'date' => $request->input('date'),
            ]);

            // Veriyi kaydet
            $certificate->save();

            // Başarı mesajı ile yönlendirme
            return redirect()->route('certificate.index')->with('success', 'Certificate uploaded successfully!');
        }

        // Dosya geçerli değilse hata mesajı döndür
        return redirect()->back()->withErrors(['image' => 'Geçersiz dosya veya dosya yüklenmedi.'])->withInput();
    }

    public function edit($id)
    {
        // Düzenlenecek sertifikayı veritabanından buluyoruz
        $certificate = Certificate::findOrFail($id);

        // Sertifikayı view'a gönderiyoruz
        return view('admin.certification.edit', compact('certificate'));
    }

    public function update(Request $request, $id)
    {
        // Sertifikayı buluyoruz
        $certificate = Certificate::findOrFail($id);

        // Veritabanına veri eklenmeden önce gelen verileri doğrulama
        $request->validate([
            'image' => 'nullable|file|image|mimes:jpg,png,jpeg,gif|max:10240', // Maksimum 10MB
            'name' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        // Eğer yeni dosya yüklenmişse, mevcut dosyayı silip yeni dosyayı kaydediyoruz
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Mevcut resmi sil
            if ($certificate->image_path && \Storage::exists('public/' . $certificate->image_path)) {
                \Storage::delete('public/' . $certificate->image_path);
            }

            // Yeni resmi kaydet
            $imagePath = $request->file('image')->store('certificates', 'public');
            $certificate->image_path = $imagePath;
        }

        // Sertifikayı güncelliyoruz
        $certificate->name = $request->input('name');
        $certificate->date = $request->input('date');

        // Güncellenmiş sertifikayı kaydediyoruz
        $certificate->save();

        // Başarı mesajı ile yönlendirme
        return redirect()->route('certificate.index')->with('success', 'Certificate updated successfully!');
    }

    public function destroy($id)
    {
        // Silinecek sertifikayı veritabanından buluyoruz
        $certificate = Certificate::findOrFail($id);

        // Sertifikanın resmini sil
        if ($certificate->image_path && \Storage::exists('public/' . $certificate->image_path)) {
            \Storage::delete('public/' . $certificate->image_path);
        }

        // Sertifikayı siliyoruz
        $certificate->delete();

        // Başarı mesajı ile yönlendirme
        return redirect()->route('certificate.index')->with('success', 'Certificate deleted successfully!');
    }
}
