@extends("admin.layouts.app")
@section("content")


    <section class="section">
        <div class="section-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2>Sertifikalarım</h2>
                <a href="{{ route('certificate.create') }}" class="btn btn-primary">Sertifika Ekle</a>
            </div>

            @if($certificates->isEmpty())
                <p class="text-center">Henüz eklenmiş bir sertifika bulunmamaktadır.</p>
            @else
                <div class="table-responsive">
                    <table id="Table" class="table table-bordered">
                        <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Sertifika</th>
                            <th>Ad</th>
                            <th>Alınan Tarih</th>
                            <th>Oluşturulma Tarihi</th>
                            <th>Güncelleme Tarihi</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($certificates as $index => $certificate)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $certificate->image_path) }}"
                                         alt="Sertifika" width="100">
                                </td>
                                <td>{{ $certificate->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($certificate->date)->format('d-m-Y') }}</td>
                                <td>{{ $certificate->created_at }}</td>
                                <td>{{ $certificate->updated_at }}</td>
                                <td>
                                    <!-- Güncelleme Butonu -->
                                    <a href="{{ route('certificate.edit', $certificate->id) }}" class="btn btn-primary btn-lg">
                                        Güncelle
                                    </a>

                                    <!-- Silme Butonu (Form İçine Alınmış) -->
                                    <form action="{{ route('certificate.destroy', $certificate->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-lg">Sil</button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </section>
    <!-- jQuery kütüphanesini ekle -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- CSRF token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
