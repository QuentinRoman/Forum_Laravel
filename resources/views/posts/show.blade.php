@extends('layouts.app')

@section('content')
    <div class="card bg-dark">
        <div class="card-body">
            <h5 class="card-title text-light">{{ $post->title }}</h5>
            <p>{{ $post->content }}</p>
        </div>
    </div>
    @can('edit-posts')
        <a href="{{ route('Posts.edit', $post) }}"><button type="button" class="btn btn-primary">Edit</button></a>
    @endcan
    @can('delete-posts')
    <form action="{{ route('Posts.destroy', $post) }}" method="POST" class="float-left">
        @csrf
        {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-warning">Delete</button>
    </form>
    @endcan
@endsection

