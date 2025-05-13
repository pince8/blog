@extends("admin.layouts.app")
@section("content")

    <div class="card shadow-sm p-3">
        <div class="card-header">
            <h4 class="fs-1">Dizi Güncelleme</h4>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card-body">
            <!-- Dizi Güncelleme Formu -->
            <form action="{{ route('series.update', $dizi->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="series_name">Dizi Adı</label>
                    <input type="text" name="series_name" id="series_name" class="form-control"
                           value="{{ $dizi->series_name }}" required>
                </div>

                <div class="form-group">
                    <label for="director">Yönetmen</label>
                    <input type="text" name="director" id="director" class="form-control"
                           value="{{ $dizi->director }}" required>
                </div>

                <div class="form-group">
                    <label for="genre">Tür</label>
                    <input type="text" name="genre" id="genre" class="form-control"
                           value="{{ $dizi->genre }}" required>
                </div>
                <div class="form-group">
                    <label for="season">Sezon Sayısı:</label>
                    <input type="number" id="season" name="season" class="form-control" value="{{ $dizi->season }}" min="1" placeholder="Kaç sezon olduğunu giriniz" required>
                </div>
                <div class="form-group">
                    <label for="rating">Puan</label>
                    <input type="number" step="0.1" name="rating" id="rating" class="form-control"
                           value="{{ $dizi->rating }}" required>
                </div>

                <div class="form-group">
                    <label for="description">Açıklama</label>
                    <textarea name="description" id="description" class="form-control" rows="4"
                              required>{{ $dizi->description }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Güncelle</button>
            </form>

        </div>
    </div>

@endsection
