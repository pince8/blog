@extends('admin.layouts.app')
@section('content')
    <h1>{{ $blog->title }}</h1>
    <p>{{ $blog->content }}</p>
    @if($blog->image_path)
        <img src="{{ asset('storage/'.$blog->image_path) }}" alt="Blog Image" width="200">
    @endif
@endsection
