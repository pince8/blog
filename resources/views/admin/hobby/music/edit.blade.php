@extends("admin.layouts.app")
@section("content")

    <div class="card shadow-sm p-3">
        <div class="card-header">
            <h4 class="fs-1">Şarkı Güncelleme</h4>
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
            <form action="{{ route('music.update', $music->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Şarkı Adı</label>
                    <input type="text" name="name" id="name" class="form-control"
                           value="{{ $music->name }}" required>
                </div>

                <div class="form-group">
                    <label for="singer">Sanatçı</label>
                    <input type="text" name="singer" id="singer" class="form-control"
                           value="{{ $music->singer }}" required>
                </div>

                <div class="form-group">
                    <label for="genre">Tür:</label>
                    <select id="genre" name="genre" class="form-control" required>
                        <option value="">Müzik türünü seçiniz</option>
                        <option value="Rock" {{ $music->genre == 'Rock' ? 'selected' : '' }}>Rock</option>
                        <option value="Pop" {{ $music->genre == 'Pop' ? 'selected' : '' }}>Pop</option>
                        <option value="Jazz" {{ $music->genre == 'Jazz' ? 'selected' : '' }}>Jazz</option>
                        <option value="Classical" {{ $music->genre == 'Classical' ? 'selected' : '' }}>Klasik</option>
                        <option value="Hip-Hop" {{ $music->genre == 'Hip-Hop' ? 'selected' : '' }}>Hip-Hop</option>
                        <!-- Diğer türler burada eklenebilir -->
                    </select>
                </div>



                <div class="form-group">
                    <label for="rating">Puan (0-10)</label>
                    <input type="number" name="rating" id="rating" class="form-control"
                           value="{{ $music->rating }}" step="0.1" min="0" max="10" required>
                </div>

                <div class="form-group">
                    <label for="status">Durum</label>
                    <select name="status" id="status" class="form-control">
                        <option value="1" {{ $music->status == 1 ? 'selected' : '' }}>Aktif</option>
                        <option value="0" {{ $music->status == 0 ? 'selected' : '' }}>Pasif</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Güncelle</button>
            </form>
        </div>
    </div>

@endsection
