@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Hakkımda Bilgileri</h2>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if($about)  <!-- about verisi var mı diye kontrol ediliyor -->
                <div class="row">
                    <div class="col-12 col-md-3">
                        <strong>İsim</strong>
                    </div>
                    <div class="col-12 col-md-9">
                        {{ $about->name }}
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-12 col-md-3">
                        <strong>Biyografi</strong>
                    </div>
                    <div class="col-12 col-md-9">
                        {{ $about->bio }}
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-12 col-md-3">
                        <strong>Profil Fotoğrafı</strong>
                    </div>
                    <div class="col-12 col-md-9">
                        @if(isset($about->profile_picture))
                            <img src="{{ asset('storage/' . $about->profile_picture) }}" alt="Profil Fotoğrafı" width="100">
                        @else
                            <span>Fotoğraf yok</span>
                        @endif
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-12 col-md-3">
                        <strong>Programlama Dilleri</strong>
                    </div>
                    <div class="col-12 col-md-9">
                        @foreach($about->languages as $language)
                            <p>{{ $language['name'] }} - {{ $language['level'] }}</p>
                        @endforeach
                    </div>
                </div>

                <!-- Düzenleme Butonu -->
                <a href="{{ route('about.edit') }}" class="btn btn-warning mt-2">Düzenle</a>
                @else
                    <p>Hakkımda bilgileri mevcut değil. Lütfen önce bilgileri ekleyin.</p>
                    <a href="{{ route('about.edit') }}" class="btn btn-primary mt-2">Bilgileri Ekle</a>
                @endif
            </div>
        </div>
    </div>
@endsection
