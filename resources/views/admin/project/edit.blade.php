@extends("admin.layouts.app")
@section("content")

    <div class="container">
        <h1>Edit Project: {{ $project->title }}</h1>

        <form action="{{ route('project.update', $project->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
            @method('PUT') <!-- Update işlemi için PUT metodu kullanıyoruz -->

            <div class="form-group">
                <label for="title">Project Title</label>
                <input type="text" class="form-control" id="title" name="title"
                       value="{{ old('title', $project->title) }}" required>
            </div>

            <div class="form-group">
                <label for="description">Project Description</label>
                <textarea class="form-control" id="description" name="description"
                          required>{{ old('description', $project->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="github_link">GitHub Link (Optional)</label>
                <input type="url" class="form-control" id="github_link" name="github_link"
                       value="{{ old('github_link', $project->github_link) }}">
            </div>

            <div class="form-group">
                <label for="file">Project File (Optional)</label>
                <input type="file" class="form-control" id="file" name="file">
                @if($project->file_path)
                    <a href="{{ asset('storage/' . $project->file_path) }}" class="btn btn-info mt-2" target="_blank">Download
                        Current File</a>
                @endif
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update Project</button>
        </form>
    </div>

@endsection
