@extends('layouts.app')

@section('content')
    <form action="{{ route('category.store') }}" method="POST">
        @csrf
        <div class="form-group text-light">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" required>
            @error('name')
            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
            @enderror
        </div>
        <div class="form-group text-light">
            <label for="slug">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" required>
            @error('slug')
            <div class="invalid-feedback">{{ $errors->first('slug') }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-outline-primary">Post</button>
    </form>
@endsection
