@extends("admin.layouts.app")
@section("content")

    <section class="section">
        <div class="section-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2>Bloglar</h2>
                <a href="{{ route('blog.create') }}" class="btn btn-primary">Yeni Blog Oluştur</a>
            </div>

            @if($blogs->isEmpty())
                <p class="text-center">Henüz eklenmiş bir blog bulunmamaktadır.</p>
            @else
                <div class="table-responsive">
                    <table id="Table" class="table table-bordered">
                        <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Başlık</th>
                            <th>Yayınlanma Tarihi</th>
                            <th>Fotoğraf</th>
                            <th>İçerik</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($blogs as $index => $blog)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->created_at->format('d-m-Y') }}</td>
                                <td>
                                    @if($blog->image)
                                        <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" style="width: 100px; height: auto;">
                                    @else
                                        <span>Fotoğraf yok</span>
                                    @endif
                                </td>
                                <td>{{ \Str::limit($blog->content, 100) }}</td>
                                <td>
                                    <!-- Düzenle Butonu -->
                                    <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-primary btn-lg">Düzenle</a>

                                    <!-- Silme Butonu -->
                                    <form action="{{ route('blog.destroy', $blog->id) }}" method="POST" style="display:inline;">
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
