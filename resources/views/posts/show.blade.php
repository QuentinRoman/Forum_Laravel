@extends('layouts.app')

@section('content')
    <div class="card bg-dark text-light">
        <div class="card-body">
            <h5 class="card-title text-light">{{ $post->title }}</h5>
            <p>{{ $post->content }}</p>
        </div>
    </div>
    @can('edit-posts')
        <a href="{{ route('posts.edit', $post) }}"><button type="button" class="btn btn-sm btn-link text-uppercase">Edit Post</button></a>
    @endcan
    @can('delete-posts')
    <form action="{{ route('posts.destroy', $post) }}" method="POST" class="float-left">
        @csrf
        {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-sm btn-link text-uppercase text-danger">Delete Post</button>
    </form>
    <br>
    <br>
    @endcan
    <div>
        @comments(['model' => $post])
    </div>
@endsection

