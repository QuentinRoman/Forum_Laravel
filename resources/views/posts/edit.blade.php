@extends('layouts.app')

@section('content')
    <form action="{{ route('posts.update', $post) }}" method="POST">
        @csrf
        {{ method_field('PUT') }}
        <div class="form-group text-light">
            <label for="title">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ $post->title }}"  name="title" id="title">
            @error('title')
            <div class="invalid-feedback">{{ $errors->first('title') }}</div>
            @enderror
        </div>

        <div class="form-group text-light">
            <label for="content">Content</label>
            <textarea class="form-control @error('content') is-invalid @enderror" rows="5" name="content" id="content">{{ $post->content }}</textarea>
            @error('content')
            <div class="invalid-feedback">{{ $errors->first('content') }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-outline-primary">Update</button>
    </form>
@endsection
