@extends("admin.layouts.app")
@section("content")

    <div class="card shadow-sm p-3">
        <div class="card-header ">
            <h4 class="fs-1">Kitap İşlemleri</h4>
        </div>

        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <a href="{{ route('books.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-circle"></i> Kitap Ekle
                </a>
            </div>
            <hr>

            <div class="table-responsive">
                <table id="Table" class="table table-bordered table-striped table-hover w-100">
                    <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Kitap Adı</th>
                        <th>Yazar</th>
                        <th>Tür</th>
                        <th>Sayfa Sayısı</th>
                        <th>Açıklama</th>
                        <th>Oluşturulma Tarihi</th>
                        <th>Güncelleme Tarihi</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($books as $book)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $book->kitap_adi }}</td>
                            <td>{{ $book->yazar }}</td>
                            <td>{{ $book->tur }}</td>
                            <td>{{ $book->sayfa_sayisi }}</td>
                            <td>{{ $book->aciklama ?? 'Açıklama bulunmamaktadır.' }}</td>
                            <td>{{ $book->created_at }}</td>
                            <td>{{ $book->updated_at }}</td>
                            <td>
                                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary btn-lg">
                                    Güncelle
                                </a>
                                <form action="{{ route('books.destroy', $book->id) }}" method="POST"
                                      style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-lg">Sil</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if($books->isEmpty())
                        <tr>
                            <td colspan="9" class="text-center">Henüz kitap eklenmedi.</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
