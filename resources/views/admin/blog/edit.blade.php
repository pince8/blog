@extends('admin.layouts.app')
@section('content')
    <h1>Blog Düzenle</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Başlık</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $blog->title) }}" required>
        </div>
        <div class="form-group">
            <label for="content">İçerik</label>
            <textarea class="form-control" name="content" id="content" rows="5" required>{{ old('content', $blog->content) }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Resim (Opsiyonel)</label>
            <input type="file" class="form-control" name="image" id="image">
            @if($blog->image_path)
                <img src="{{ asset('storage/'.$blog->image_path) }}" alt="Blog Image" class="mt-2" width="100">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Blogu Güncelle</button>
    </form>
@endsection
