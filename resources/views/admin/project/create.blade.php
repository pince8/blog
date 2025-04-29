@extends("admin.layouts.app")

@section("content")
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container">
        <h1>Yeni Proje Ekle</h1>

        <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Proje Başlığı</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="form-group">
                <label for="description">Proje Açıklaması</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>

            <div class="form-group">
                <label for="github_link">GitHub Linki (opsiyonel)</label>
                <input type="url" class="form-control" id="github_link" name="github_link">
            </div>

            <div class="form-group">
                <label for="file">Proje Dosyası (opsiyonel)</label>
                <input type="file" class="form-control" id="file" name="file">
            </div>

            <button type="submit" class="btn btn-primary mt-3">Kaydet</button>
        </form>
    </div>
@endsection
