@extends("admin.layouts.app")
@section("content")

    <div class="card shadow-sm p-3">
        <div class="card-header">
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
                @if($series->isEmpty())
                    <p class="text-center">Henüz hiç dizi eklenmedi.</p> <!-- Burada direkt mesaj gösterebilirsiniz -->
                @else
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
                                <td>{{ $dizi->series_name }}</td> <!-- 'series_name' doğru alan ismiyle -->
                                <td>{{ $dizi->director }}</td> <!-- 'director' doğru alan ismiyle -->
                                <td>{{ $dizi->genre }}</td> <!-- 'genre' doğru alan ismiyle -->
                                <td>{{ $dizi->season }}</td> <!-- 'season' doğru alan ismiyle -->
                                <td>{{ $dizi->rating }}/10</td> <!-- 'rating' doğru alan ismiyle -->
                                <td>{{ $dizi->description ?? 'Açıklama bulunmamaktadır.' }}</td> <!-- 'description' doğru alan ismiyle -->
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
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>

@endsection
