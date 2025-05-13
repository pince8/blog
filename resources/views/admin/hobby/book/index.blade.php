@extends("admin.layouts.app")
@section("content")
    <div class="card shadow-sm p-3">
        <div class="card-header">
            <h4 class="fs-1">Kitaplar</h4>
        </div>

        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <a href="{{ route('books.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-circle"></i> Kitap Ekle
                </a>
            </div>
            <hr>

            <div class="table-responsive">
                @if($books->isEmpty())
                    <p class="text-center">Henüz hiç kitap eklenmedi.</p>
                @else
                    <table class="table table-bordered table-striped table-hover w-100" id="booksTable">
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
                                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
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

    <!-- jQuery kütüphanesini ekle -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables CSS ve JS kütüphanelerini ekle -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <!-- DataTables Başlatma -->
    <script>
        $(document).ready(function() {
            $('#booksTable').DataTable();  // Tablonuzu DataTable olarak başlatır
        });
    </script>
@endsection
