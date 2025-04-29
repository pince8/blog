@extends("admin.layouts.app")
@section("content")

    <div class="card shadow-sm p-3">


        <div class="card-header ">


            <h4 class="fs-1">Müzik İşlemleri</h4>
        </div>

        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <a href="http://127.0.0.1:8000/kategoriler/create" class="btn btn-success">
                    <i class="bi bi-plus-circle"></i> Müzik Ekle
                </a>
            </div>
            <hr>

            <div class="table-responsive">
                <table id="Table" class="table table-bordered table-striped table-hover w-100">
                    <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Kategori Adı</th>
                        <th>Oluşturulma Tarihi</th>
                        <th>Güncelleme Tarihi</th>
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
                            <a href="http://127.0.0.1:8000/kategoriler/update/1" class="btn btn-primary btn-lg">
                                Güncelle
                            </a>
                            <a href=" http://127.0.0.1:8000/kategoriler/delete/1" class="btn btn-danger btn-lg">
                                Sil
                            </a>
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
