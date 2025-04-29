@extends("admin.layouts.app")
@section("content")

    <div class="card shadow-sm p-3">
        <div class="card-header ">
            <h4 class="fs-1">Film İşlemleri</h4>
        </div>

        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <a href="{{ route('films.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-circle"></i> Film Ekle
                </a>
            </div>
            <hr>

            <div class="table-responsive">
                <table id="Table" class="table table-bordered table-striped table-hover w-100">

                    <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Film Adı</th>
                        <th>Yönetmen</th>
                        <th>Tür</th>
                        <th>Puan</th>
                        <th>Açıklama</th>
                        <th>Oluşturulma Tarihi</th>
                        <th>Güncelleme Tarihi</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($films as $film)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $film->film_adi }}</td>
                            <td>{{ $film->yonetmen }}</td>
                            <td>{{ $film->tur }}</td>
                            <td>{{ $film->puan }}/10</td>
                            <td>{{ $film->aciklama ?? 'Açıklama bulunmamaktadır.' }}</td>
                            <td>{{ $film->created_at }}</td>
                            <td>{{ $film->updated_at }}</td>
                            <td>
                                <a href="{{ route('filmGuncellemeSayfasi', $film->id) }}"
                                   class="btn btn-primary btn-lg">
                                    Güncelle
                                </a>
                                <form action="{{ route('films.destroy', $film->id) }}" method="POST"
                                      style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-lg">Sil</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                    @if($films->isEmpty())
                        <tr>
                            <td colspan="8" class="text-center">Henüz film eklenmedi.</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
