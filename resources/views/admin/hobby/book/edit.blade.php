@extends("admin.layouts.app")

@section("content")
    <div class="card shadow-sm p-3">
        <div class="card-header">
            <h4 class="fs-1">Kitap Güncelleme</h4>
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
            <!-- Kitap Güncelleme Formu -->
            <form action="{{ route('books.update', $book->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="kitap_adi">Kitap Adı</label>
                    <input type="text" name="kitap_adi" id="kitap_adi" class="form-control"
                           value="{{ $book->kitap_adi }}" required>
                </div>

                <div class="form-group">
                    <label for="yazar">Yazar</label>
                    <input type="text" name="yazar" id="yazar" class="form-control"
                           value="{{ $book->yazar }}" required>
                </div>

                <select id="genre" name="genre" class="form-control" required>
                    <option value="">Seçiniz</option>
                    @foreach($turler as $tur)
                        <option value="{{ $tur }}" @if($book->genre == $tur) selected @endif>{{ $tur }}</option>
                    @endforeach
                </select>

                <div class="form-group">
                    <label for="sayfa_sayisi">Sayfa Sayısı</label>
                    <input type="number" name="sayfa_sayisi" id="sayfa_sayisi" class="form-control"
                           value="{{ $book->sayfa_sayisi }}" required>
                </div>

                <div class="form-group">
                    <label for="aciklama">Açıklama</label>
                    <textarea name="aciklama" id="aciklama" class="form-control" rows="4">{{ $book->aciklama }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Güncelle</button>
            </form>
        </div>
    </div>
@endsection
