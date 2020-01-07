@extends('layouts.app')

@section('content')
    <div class="card bg-dark">
        <div class="card-body">
            <h5 class="card-title text-light">{{ $post->title }}</h5>
            <p>{{ $post->content }}</p>
        </div>
    </div>
@endsection
