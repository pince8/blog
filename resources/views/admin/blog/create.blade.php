@extends('admin.layouts.app')
@section('content')
    <h1>Yeni Blog Oluştur</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Başlık</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" required>
        </div>
        <div class="form-group">
            <label for="content">İçerik</label>
            <textarea class="form-control" name="content" id="content" rows="5" required>{{ old('content') }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Resim (Opsiyonel)</label>
            <input type="file" class="form-control" name="image" id="image">
        </div>
        <button type="submit" class="btn btn-primary">Blogu Oluştur</button>
    </form>
@endsection
