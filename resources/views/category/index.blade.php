@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                        @can('edit-users')
                            <a href="{{ route('category.create') }}"><button type="button" class="btn btn-outline-primary float-left">Create</button></a>
                        @endcan
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Slug</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <th scope="row">{{ $category->id }}</th>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>
                                        @can('edit-users')
                                            <div class="d-flex justify-content-between">
                                                <a href="{{ route('category.edit', $category->id) }}"><button type="button" class="btn btn-primary float-left">Edit</button></a>
                                            </div>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-3">
        </div>
    </div>
@endsection
