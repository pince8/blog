@extends("admin.layouts.app")
@section("content")

    <div class="card shadow-sm p-3">
        <div class="card-header">
            <h4 class="fs-1">Film Güncelleme</h4>
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
            <!-- Film Güncelleme Formu -->
            <form action="{{ route('films.update', $film->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- PUT metodu kullanacağız -->

                <div class="form-group">
                    <label for="film_adi">Film Adı</label>
                    <input type="text" name="film_adi" id="film_adi" class="form-control"
                           value="{{  $film->film_adi }}" required>
                </div>

                <div class="form-group">
                    <label for="yonetmen">Yönetmen</label>
                    <input type="text" name="yonetmen" id="yonetmen" class="form-control"
                           value="{{  $film->yonetmen }}" required>
                </div>

                <div class="form-group">
                    <label for="tur">Tür</label>
                    <input type="text" name="tur" id="tur" class="form-control" value="{{  $film->tur }}"
                           required>
                </div>

                <div class="form-group">
                    <label for="puan">Puan</label>
                    <input type="number" step="0.1" name="puan" id="puan" class="form-control"
                           value="{{  $film->puan }}" required>
                </div>

                <div class="form-group">
                    <label for="aciklama">Açıklama</label>
                    <textarea name="aciklama" id="aciklama" class="form-control" rows="4"
                              required>{{  $film->aciklama }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Güncelle</button>
            </form>
        </div>
    </div>

@endsection
