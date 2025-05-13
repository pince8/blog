@extends("admin.layouts.app")
@section("content")

    <div class="card shadow-sm p-3">
        <div class="card-header">
            <h4 class="fs-1">Şarkı İşlemleri</h4>
        </div>

        <div class="card-body">
            <div class="table-responsive text-nowrap mb-2">
                <a href="{{ route('music.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-circle"></i> Şarkı Ekle
                </a>
            </div>
            <hr>

            <div class="table-responsive">
                @if($musicList->isEmpty())
                    <p class="text-center">Henüz hiç şarkı eklenmedi.</p>
                @else
                    <table id="Table" class="table table-bordered table-striped table-hover w-100">
                        <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Şarkı Adı</th>
                            <th>Sanatçı</th>
                            <th>Tür</th>
                            <th>Puan</th>
                            <th>Durum</th>
                            <th>Oluşturulma</th>
                            <th>Güncelleme</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($musicList as $music)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $music->name }}</td>
                                <td>{{ $music->singer }}</td>
                                <td>{{ $music->genre }}</td>
                                <td>{{ $music->rating }}</td>
                                <td>
                                    <span class="badge {{ $music->status ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $music->status ? 'Aktif' : 'Pasif' }}
                                    </span>
                                </td>
                                <td>{{ $music->created_at }}</td>
                                <td>{{ $music->updated_at }}</td>
                                <td>
                                    <a href="{{ route('music.edit', $music->id) }}" class="btn btn-primary btn-lg">Güncelle</a>
                                    <form action="{{ route('music.destroy', $music->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-lg" onclick="return confirm('Silmek istediğinize emin misiniz?')">Sil</button>
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
