@extends("admin.layouts.app")

@section("content")

    <style>
        #projectsTable th, #projectsTable td {
            border: 1px solid #dee2e6 !important;
            vertical-align: middle;
        }

        #projectsTable {
            border-collapse: collapse !important;
            width: 100% !important;
        }
    </style>

    <section class="section">
        <div class="section-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2>Projelerim</h2>
                <a href="{{ route('project.create') }}" class="btn btn-primary">Proje Ekle</a>
            </div>

            @if($projects->isEmpty())
                <p class="text-center">Henüz eklenmiş bir proje bulunmamaktadır.</p>
            @else
                <div class="table-responsive">
                    <table id="projectsTable" class="table table-bordered">
                        <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Başlık</th>
                            <th>Açıklama</th>
                            <th>GitHub</th>
                            <th>Dosya</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($projects as $index => $project)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $project->title }}</td>
                                <td>{{ $project->description }}</td>
                                <td>
                                    @if($project->github_link)
                                        <a href="{{ $project->github_link }}" target="_blank">GitHub</a>
                                    @endif
                                </td>
                                <td>
                                    @if($project->file_path)
                                        <a href="{{ asset('storage/' . $project->file_path) }}" download>İndir</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('project.edit', $project->id) }}" class="btn btn-primary btn-lg">Güncelle</a>
                                    <form action="{{ route('project.destroy', $project->id) }}" method="POST" style="display:inline;">
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

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <!-- DataTable Etkinleştirme -->
    <script>
        $(document).ready(function () {
            $('#projectsTable').DataTable();
        });
    </script>

    <!-- CSRF token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
