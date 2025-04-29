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
    <form action="{{ route('certificate.update', $certificate->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="image">Certificate Image</label>
            <input type="file" class="form-control" name="image" id="image">
            @if($certificate->image_path)
                <img src="{{ asset('storage/'.$certificate->image_path) }}" alt="Certificate Image" class="mt-2" width="100">
            @endif
        </div>
        <div class="form-group">
            <label for="name">Certificate Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $certificate->name) }}" required>
        </div>
        <div class="form-group">
            <label for="date">Certificate Date</label>
            <input type="date" class="form-control" name="date" id="date" value="{{ old('date', \Carbon\Carbon::parse($certificate->date)->format('Y-m-d')) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Certificate</button>
    </form>
@endsection
