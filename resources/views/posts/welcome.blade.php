@extends('layouts.app')

@section('content')
    @can('create-posts')
    <a href="{{ route('posts.create') }}" class="button btn btn-secondary btn-lg border btn-block">Create Post</a>
    @endcan

    <div class="list-group">
        @foreach($posts as $post)
            <div class="list-group-item bg-dark bg text-light">
                <h4><a class="text-warning" href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h4>
                <p class="">{{ $post->content }}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <small>Publish the {{ $post->created_at->format('d/m/Y à H:m') }}</small>
                    <span class="badge badge-primary">Publish by {{ $post->user->name }}</span>
                </div>
            </div>
        @endforeach
        <div class="d-flex justify-content-center mt-3">
            {{ $posts->links() }}
        </div>
    </div>
@endsection

