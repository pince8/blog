@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h2>İletişim Bilgilerim</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($contact)
            <table class="table">
                <tr>
                    <th>Ad Soyad</th>
                    <td>{{ $contact->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $contact->email }}</td>
                </tr>
                <tr>
                    <th>Telefon</th>
                    <td>{{ $contact->phone }}</td>
                </tr>
                <tr>
                    <th>Adres</th>
                    <td>{{ $contact->address }}</td>
                </tr>
                <tr>
                    <th>LinkedIn</th>
                    <td>{{ $contact->linkedin }}</td>
                </tr>
                <tr>
                    <th>GitHub</th>
                    <td>{{ $contact->github }}</td>
                </tr>
            </table>

            <a href="{{ route('contact.edit') }}" class="btn btn-warning">Düzenle</a>
        @else
            <p>İletişim bilgileri mevcut değil. Lütfen önce ekleyin.</p>
            <a href="{{ route('contact.edit') }}" class="btn btn-primary">Bilgileri Ekle</a>
        @endif
    </div>
@endsection
