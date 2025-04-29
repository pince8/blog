@extends('admin.layouts.app')
@section('content')
    <h1>Bloglar</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('blog.create') }}" class="btn btn-primary mb-3">Yeni Blog Oluştur</a>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Başlık</th>
            <th>Yayınlanma Tarihi</th>
            <th>Fotoğraf</th>
            <th>İçerik</th>
            <th>İşlemler</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($blogs as $blog)
            <tr>
                <td>{{ $blog->title }}</td>
                <td>{{ $blog->created_at->format('d-m-Y') }}</td>
                <td>
                    @if($blog->image)
                        <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" style="width: 100px; height: auto;">
                    @else
                        <span>Fotoğraf yok</span>
                    @endif
                </td>
                <td>{{ \Str::limit($blog->content, 100) }}</td>  <!-- İçerikten 100 karakter gösteriyoruz -->
                <td>
                    <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-warning">Düzenle</a>
                    <form action="{{ route('blog.destroy', $blog->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Sil</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
