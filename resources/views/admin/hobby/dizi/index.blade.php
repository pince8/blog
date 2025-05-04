@extends("admin.layouts.app")
@section("content")

    <div class="card shadow-sm p-3">
        <div class="card-header ">
            <h4 class="fs-1">Dizi İşlemleri</h4>
        </div>

        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <a href="{{ route('series.create') }}" class="btn btn-success">
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
                        <th>Yönetmen</th>
                        <th>Tür</th>
                        <th>Sezon</th>
                        <th>Puan</th>
                        <th>Açıklama</th>
                        <th>Oluşturulma Tarihi</th>
                        <th>Güncelleme Tarihi</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($series as $dizi)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dizi->dizi_adi }}</td>
                            <td>{{ $dizi->yonetmen }}</td>
                            <td>{{ $dizi->tur }}</td>
                            <td>{{ $dizi->sezon }}</td>
                            <td>{{ $dizi->puan }}/10</td>
                            <td>{{ $dizi->aciklama ?? 'Açıklama bulunmamaktadır.' }}</td>
                            <td>{{ $dizi->created_at }}</td>
                            <td>{{ $dizi->updated_at }}</td>
                            <td>
                                <a href="{{ route('series.edit', $dizi->id) }}"
                                   class="btn btn-primary btn-lg">
                                    Güncelle
                                </a>
                                <form action="{{ route('series.destroy', $dizi->id) }}" method="POST"
                                      style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-lg">Sil</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if($series->isEmpty())
                        <tr>
                            <td colspan="10" class="text-center">Henüz dizi eklenmedi.</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
