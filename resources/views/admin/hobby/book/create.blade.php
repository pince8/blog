@extends("admin.layouts.app")
@section("content")
    <div class="card shadow-sm p-3">
        <div class="card-header">
            <h4 class="fs-1">Kitap Ekleme</h4>
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
            <!-- Kitap Ekleme Formu -->
            <form action="{{ route('books.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="kitap_adi">Kitap Adı</label>
                    <input type="text" name="kitap_adi" id="kitap_adi" class="form-control" placeholder="Kitap adı giriniz" required>
                </div>

                <div class="form-group">
                    <label for="yazar">Yazar</label>
                    <input type="text" name="yazar" id="yazar" class="form-control" placeholder="Yazar adı giriniz" required>
                </div>

                <div class="form-group">
                    <label for="genre">Tür:</label>
                    <select id="tur" name="tur" class="form-control" required>
                        <option value="">Seçiniz</option>
                        @foreach($turler as $tur)
                            <option value="{{ $tur }}">{{ $tur }}</option>
                        @endforeach
                    </select>

                </div>


                <div class="form-group">
                    <label for="sayfa_sayisi">Sayfa Sayısı</label>
                    <input type="number" name="sayfa_sayisi" id="sayfa_sayisi" class="form-control" min="1" placeholder="Sayfa sayısını giriniz" required>
                </div>

                <div class="form-group">
                    <label for="aciklama">Açıklama</label>
                    <textarea name="aciklama" id="aciklama" class="form-control" rows="3" placeholder="Kitap hakkında açıklama giriniz"></textarea>
                </div>

                <button type="submit" class="btn btn-info">Kaydet</button>
            </form>
        </div>
    </div>
@endsection
