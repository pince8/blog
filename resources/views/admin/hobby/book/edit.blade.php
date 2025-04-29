@extends("admin.layouts.app")
@section("content")

    <div class="card shadow-sm p-3">
        <div class="card-header ">
            <h4 class="fs-1">Kitap Güncelleme</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('books.update', $book->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="kitap_adi">Kitap Adı</label>
                    <input type="text" name="kitap_adi" value="{{ $book->kitap_adi }}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="yazar">Yazar</label>
                    <input type="text" name="yazar" value="{{ $book->yazar }}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="tur">Tür</label>
                    <input type="text" name="tur" value="{{ $book->tur }}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="sayfa_sayisi">Sayfa Sayısı</label>
                    <input type="number" name="sayfa_sayisi" value="{{ $book->sayfa_sayisi }}" class="form-control"
                           required>
                </div>

                <div class="form-group">
                    <label for="aciklama">Açıklama</label>
                    <textarea name="aciklama" class="form-control">{{ $book->aciklama }}</textarea>
                </div>

                <button type="submit" class="btn btn-success mt-3">Kitap Güncelle</button>
            </form>
        </div>
    </div>

@endsection
