@extends("admin.layouts.app")
@section("content")

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <section class="section">
        <div class="section-body">
            <h2>İletişim Bilgilerimi Düzenle</h2>

            <form action="{{ route('contact.update', $contact->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Ad Soyad</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $contact->name }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ $contact->email }}"
                           required>
                </div>

                <div class="form-group">
                    <label for="phone">Telefon</label>
                    <input type="text" class="form-control" name="phone" id="phone" value="{{ $contact->phone }}"
                           required>
                </div>

                <div class="form-group">
                    <label for="address">Adres</label>
                    <input type="text" class="form-control" name="address" id="address" value="{{ $contact->address }}"
                           required>
                </div>

                <div class="form-group">
                    <label for="linkedin">LinkedIn</label>
                    <input type="text" class="form-control" name="linkedin" id="linkedin"
                           value="{{ $contact->linkedin }}" required>
                </div>

                <div class="form-group">
                    <label for="github">GitHub</label>
                    <input type="text" class="form-control" name="github" id="github" value="{{ $contact->github }}"
                           required>
                </div>

                <button type="submit" class="btn btn-primary">Bilgileri Güncelle</button>
            </form>
        </div>
    </section>

@endsection
