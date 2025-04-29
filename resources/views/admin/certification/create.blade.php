@extends("admin.layouts.app")
@section("content")
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('certificate.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="image">Certificate Image</label>
            <input type="file" class="form-control" name="image" id="image" required>
        </div>
        <div class="form-group">
            <label for="name">Certificate Name</label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>
        <div class="form-group">
            <label for="date">Certificate Date</label>
            <input type="date" class="form-control" name="date" id="date" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload Certificate</button>
    </form>

@endsection
