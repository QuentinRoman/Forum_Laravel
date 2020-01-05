@extends('layouts.app')

@section('content')
    <a href="/create" class="button btn btn-secondary btn-lg border btn-block">Create Post</a>
    <br><br>
    <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Name</th>
            <th scope="col">Category</th>
            <th scope="col">Date</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Il faut ranger le fablab</td>
            <td>Quentin</td>
            <td>Fablab</td>
            <td>{{now()}}</td>
        </tr>
        </tbody>
    </table>
@endsection
