@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Categories list</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('admin.categories.create') }}">Add category</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>News</th>
                <th>Title</th>
                <th>Description</th>
                <th>Date added</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($categoriesList as $categories)
                <tr>
                    <td>{{ $categories->id }}</td>
                    <td>{{ $categories->news->map(fn($item) => $item->title)->implode(",") }}</td>
                    <td>{{ $categories->title }}</td>
                    <td>{{ $categories->description }}</td>
                    <td>{{ $categories->created_at }}</td>
                    <td><a href="{{ route('admin.categories.edit', ['categories' => $categories]) }}">Change</a> &nbsp; <a href="" style="color: red;">Delete</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">No entries</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        {{ $categoriesList->links() }}
    </div>
@endsection
