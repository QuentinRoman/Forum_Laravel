@extends('layouts.app')

@section('content')
<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    <div class="form-group text-light">
        <label for="title">Title</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title">
        @error('title')
        <div class="invalid-feedback">{{ $errors->first('title') }}</div>
        @enderror
    </div>
    <div class="text-light">
        <label>Categories</label>
    @foreach($categories as $category)
        <div class="form-check">
            <label>
                <input type="radio" name="categories" value="">
                {{ $category->name }}
            </label>
        </div>
    @endforeach
    </div>
    <div class="form-group text-light">
        <label for="content">Content</label>
        <textarea class="form-control @error('content') is-invalid @enderror" rows="5"  name="content" id="content"></textarea>
        @error('content')
        <div class="invalid-feedback">{{ $errors->first('content') }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-outline-primary">Post</button>
</form>
@endsection
