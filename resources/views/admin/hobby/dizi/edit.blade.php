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
                    <label for="dizi_adi">Dizi Adı</label>
                    <input type="text" name="dizi_adi" id="dizi_adi" class="form-control"
                           value="{{ old('dizi_adi', $dizi->dizi_adi) }}" required>
                </div>

                <div class="form-group">
                    <label for="yonetmen">Yönetmen</label>
                    <input type="text" name="yonetmen" id="yonetmen" class="form-control"
                           value="{{ old('yonetmen', $dizi->yonetmen) }}" required>
                </div>

                <div class="form-group">
                    <label for="tur">Tür</label>
                    <input type="text" name="tur" id="tur" class="form-control"
                           value="{{ old('tur', $dizi->tur) }}" required>
                </div>

                <div class="form-group">
                    <label for="sezon">Sezon</label>
                    <input type="number" name="sezon" id="sezon" class="form-control"
                           value="{{ old('sezon', $dizi->sezon) }}" required>
                </div>

                <div class="form-group">
                    <label for="puan">Puan</label>
                    <input type="number" step="0.1" name="puan" id="puan" class="form-control"
                           value="{{ old('puan', $dizi->puan) }}" required>
                </div>

                <div class="form-group">
                    <label for="aciklama">Açıklama</label>
                    <textarea name="aciklama" id="aciklama" class="form-control" rows="4"
                              required>{{ old('aciklama', $dizi->aciklama) }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Güncelle</button>
            </form>
        </div>
    </div>

@endsection
