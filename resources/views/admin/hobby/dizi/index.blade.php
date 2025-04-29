@extends("admin.layouts.app")
@section("content")

    <div class="card shadow-sm p-3">


        <div class="card-header ">


            <h4 class="fs-1">Dizi İşlemleri</h4>
        </div>

        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <a href="http://127.0.0.1:8000/kategoriler/create" class="btn btn-success">
                    <i class="bi bi-plus-circle"></i> Dizi Ekle
                </a>
            </div>
            <hr>

            <div class="table-responsive">
                <table id="Table" class="table table-bordered table-striped table-hover w-100">
                    <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Dizi Adı</th>
                        <th>Yapımcısı</th>
                        <th>Kategorisi</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Kişisel Gelişim</td>
                        <td>2025-01-09 22:00:56</td>
                        <td>2025-01-09 22:00:56</td>
                        <td>
                            <!-- Güncelleme Butonu -->
                            <a href="http://127.0.0.1:8000/films/update/1" class="btn btn-primary btn-lg">
                                Güncelle
                            </a>

                            <!-- Silme Butonu (Form İçine Alınmış) -->
                            <form action="{{ route('films.destroy', 1) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-lg">Sil</button>
                            </form>
                        </td>

                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Dram</td>
                        <td>2025-01-09 22:00:56</td>
                        <td>2025-01-09 22:00:56</td>
                        <td>
                            <a href="http://127.0.0.1:8000/kategoriler/update/2" class="btn btn-primary btn-lg">
                                Güncelle
                            </a>
                            <a href=" http://127.0.0.1:8000/kategoriler/delete/2" class="btn btn-danger btn-lg">
                                Sil
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
