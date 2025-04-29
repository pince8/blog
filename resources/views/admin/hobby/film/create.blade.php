@extends("admin.layouts.app")
@section("content")
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Film Ekle</h4>
            </div>

            <div class="card-body">
                <form action="{{route('films.store')}}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="filmAdi">Film Adı:</label>
                        <input type="text" id="filmAdi" name="film_adi" class="form-control"
                               placeholder="Film adını giriniz">
                    </div>

                    <div class="form-group">
                        <label for="yonetmen">Yönetmen:</label>
                        <input type="text" id="yonetmen" name="yonetmen" class="form-control"
                               placeholder="Yönetmen adını giriniz">
                    </div>

                    <div class="form-group">
                        <label for="tur">Tür:</label>
                        <select id="tur" name="tur" class="form-control">
                            <option value="">Seçiniz</option>
                            <option value="Aksiyon">Aksiyon</option>
                            <option value="Dram">Dram</option>
                            <option value="Komedi">Komedi</option>
                            <option value="Bilim Kurgu">Bilim Kurgu</option>
                            <option value="Korku">Korku</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="puan">Puan (1-10):</label>
                        <input type="number" id="puan" name="puan" class="form-control" min="1" max="10" step="0.1"
                               placeholder="Filme verdiğiniz puanı giriniz">
                    </div>

                    <div class="form-group">
                        <label for="aciklama">Açıklama:</label>
                        <textarea id="aciklama" name="aciklama" class="form-control" rows="3"
                                  placeholder="Film hakkında açıklama giriniz"></textarea>
                    </div>

                    <button type="submit" class="btn btn-info">Kaydet</button>
                </form>
            </div>
        </div>
    </div>

@endsection
