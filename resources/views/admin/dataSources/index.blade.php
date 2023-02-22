@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Sources</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Source</th>
                <th>Link</th>
                <th>Date added</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($listDataSource as $dataSource)
                <tr>
                    <td>{{ $dataSource->id }}</td>
                    <td>{{ $dataSource->source }}</td>
                    <td>{{ $dataSource->url }}</td>
                    <td>{{ $dataSource->created_at }}</td>
                    <td><a href="">Change</a> &nbsp; <a href="" style="color: red">Delete</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">No entries</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
