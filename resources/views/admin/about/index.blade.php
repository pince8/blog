@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>İletişim Bilgilerim</h2>
        <table class="table">
            <tr>
                <th>Ad</th>
                <td>{{ $contact->ad }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $contact->email }}</td>
            </tr>
            <tr>
                <th>Mesaj</th>
                <td>{{ $contact->mesaj }}</td>
            </tr>
        </table>

        <!-- Edit butonu -->
        <a href="{{ route('contact.edit', $contact->id) }}" class="btn btn-warning">Düzenle</a>
    </div>
@endsection
