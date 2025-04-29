@extends("admin.layouts.app")

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Hakkımda Bilgilerini Güncelle</h2>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('about.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- İsim -->
                    <div class="form-group">
                        <label for="name">İsim:</label>
                        <input type="text" name="name" id="name" class="form-control"
                               value="{{ old('name', $about->name ?? '') }}" required>
                    </div>

                    <!-- Biyografi -->
                    <div class="form-group">
                        <label for="bio">Biyografi:</label>
                        <textarea name="bio" id="bio" class="form-control" rows="4"
                                  required>{{ old('bio', $about->bio ?? '') }}</textarea>
                    </div>

                    <!-- Profil Fotoğrafı -->
                    <div class="form-group">
                        <label for="profile_picture">Profil Fotoğrafı:</label>
                        <input type="file" name="profile_picture" id="profile_picture" class="form-control">
                        @if(isset($about->profile_picture))
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $about->profile_picture) }}" alt="Profil Fotoğrafı"
                                     width="100">
                            </div>
                        @endif
                    </div>

                    <!-- Programlama Dilleri -->
                    <div class="form-group">
                        <label>Bildigin Programlama Dilleri:</label>
                        <div id="languages-container">
                            @php
                                $languages = old('languages', isset($about->languages) ? $about->languages : [['name' => '', 'level' => 'Başlangıç']]);
                            @endphp

                            @foreach ($languages as $index => $language)
                                <div class="input-group mb-2 language-row">
                                    <input type="text" name="languages[]" class="form-control" placeholder="Dil Adı"
                                           value="{{ $language['name'] ?? '' }}" required>
                                    <select name="levels[]" class="form-control">
                                        <option
                                            value="Başlangıç" {{ ($language['level'] ?? '') == 'Başlangıç' ? 'selected' : '' }}>
                                            Başlangıç
                                        </option>
                                        <option
                                            value="Orta" {{ ($language['level'] ?? '') == 'Orta' ? 'selected' : '' }}>
                                            Orta
                                        </option>
                                        <option
                                            value="İleri" {{ ($language['level'] ?? '') == 'İleri' ? 'selected' : '' }}>
                                            İleri
                                        </option>
                                    </select>
                                    <button type="button" class="btn btn-danger remove-language">Sil</button>
                                </div>
                            @endforeach
                        </div>
                        <button type="button" class="btn btn-secondary mt-2" id="add-language">Dil Ekle</button>
                    </div>

                    <!-- Güncelle Butonu -->
                    <button type="submit" class="btn btn-primary mt-3">Güncelle</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.getElementById("add-language").addEventListener("click", function () {
                let container = document.getElementById("languages-container");
                let newRow = document.createElement("div");
                newRow.classList.add("input-group", "mb-2", "language-row");

                newRow.innerHTML = `
            <input type="text" name="languages[]" class="form-control" placeholder="Dil Adı" required>
            <select name="levels[]" class="form-control">
                <option value="Başlangıç">Başlangıç</option>
                <option value="Orta">Orta</option>
                <option value="İleri">İleri</option>
            </select>
            <button type="button" class="btn btn-danger remove-language">Sil</button>
        `;

                container.appendChild(newRow);

                newRow.querySelector(".remove-language").addEventListener("click", function () {
                    newRow.remove();
                });
            });

            document.querySelectorAll(".remove-language").forEach(button => {
                button.addEventListener("click", function () {
                    button.parentElement.remove();
                });
            });
        });
    </script>
@endsection
