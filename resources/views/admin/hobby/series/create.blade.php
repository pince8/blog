@extends("admin.layouts.app")
@section("content")
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Dizi Ekle</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('series.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="series_name">Dizi Adı:</label>
                        <input type="text" id="series_name" name="series_name" class="form-control" placeholder="Dizi adını giriniz" required>
                    </div>

                    <div class="form-group">
                        <label for="director">Yönetmen:</label>
                        <input type="text" id="director" name="director" class="form-control" placeholder="Yönetmen adını giriniz" required>
                    </div>

                    <div class="form-group">
                        <label for="genre">Tür:</label>
                        <select id="genre" name="genre" class="form-control" required>
                            <option value="">Seçiniz</option>
                            <option value="Aksiyon">Aksiyon</option>
                            <option value="Dram">Dram</option>
                            <option value="Komedi">Komedi</option>
                            <option value="Bilim Kurgu">Bilim Kurgu</option>
                            <option value="Korku">Korku</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="season">Sezon Sayısı:</label>
                        <input type="number" id="season" name="season" class="form-control" min="1" placeholder="Kaç sezon olduğunu giriniz" required>
                    </div>

                    <div class="form-group">
                        <label for="rating">Puan (1-10):</label>
                        <input type="number" id="rating" name="rating" class="form-control" min="1" max="10" step="0.1" placeholder="Diziye verdiğiniz puanı giriniz" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Açıklama:</label>
                        <textarea id="description" name="description" class="form-control" rows="3" placeholder="Dizi hakkında açıklama giriniz"></textarea>
                    </div>

                    <button type="submit" class="btn btn-info">Kaydet</button>
                </form>
            </div>
        </div>
    </div>
@endsection
