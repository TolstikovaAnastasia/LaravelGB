@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Изменить источник</h1>
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
                <label for="source">Источник</label>
                <input type="text" id="source" name="source" value="{{ $dataSource->source }}" class="form-control @error('source') is-invalid @enderror">
            </div>
            <div class="form-group">
                <label for="url">Ссылка</label>
                <textarea class="form-control" @error('url') is-invalid @enderror id="url" name="url">{!! $dataSource->url !!}</textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection
