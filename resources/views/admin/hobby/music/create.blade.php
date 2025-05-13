@extends("admin.layouts.app")
@section("content")
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Şarkı Ekle</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('music.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name">Şarkı Adı:</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Şarkı adını giriniz" required>
                    </div>

                    <div class="form-group">
                        <label for="singer">Sanatçı:</label>
                        <input type="text" id="singer" name="singer" class="form-control" placeholder="Sanatçı adını giriniz" required>
                    </div>

                    <div class="form-group">
                        <label for="genre">Tür:</label>
                        <select id="genre" name="genre" class="form-control" required>
                            <option value="">Müzik türünü seçiniz</option>
                            <option value="Rock">Rock</option>
                            <option value="Pop">Pop</option>
                            <option value="Jazz">Jazz</option>
                            <option value="Classical">Klasik</option>
                            <option value="Hip-Hop">Hip-Hop</option>
                            <!-- Diğer türler burada eklenebilir -->
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="rating">Puan (0-10 arası):</label>
                        <input type="number" id="rating" name="rating" class="form-control" placeholder="Puan giriniz" step="0.1" min="0" max="10" required>
                    </div>

                    <div class="form-group">
                        <label for="status">Durum:</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1">Aktif</option>
                            <option value="0">Pasif</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-info">Kaydet</button>
                </form>
            </div>
        </div>
    </div>
@endsection
