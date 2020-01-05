@extends('layouts.app')

@section('content')
    <form action="" method="POST">
        <div class="form-group">
            <label for="usr">Title</label>
            <input type="text" class="form-control" id="usr">
        </div>
        <div class="form-group">
            <label for="sel1">Categories</label>
            <select class="form-control" id="sel1">
                <option>Event</option>
                <option>Fablab</option>
                <option>CCTL</option>
                <option>Administration</option>
            </select>
        </div>
        <div class="form-group">
            <label for="comment">Text</label>
            <textarea class="form-control" rows="5" id="comment"></textarea>
        </div>
        <button type="button" class="btn btn-outline-light">Post</button>
    </form>
@endsection
