@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Change source</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>
    <div>
        @if ($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif

        <form method="post" action="{{ route('admin.dataSource.update', ['dataSource' => $dataSource]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="source">Source</label>
                <input type="text" id="source" name="source" value="{{ $dataSource->source }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="url">Link</label>
                <textarea class="form-control" id="url" name="url">{!! $dataSource->url !!}</textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
@endsection
