@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить источник</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>
    <div>
        @if ($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif

        <form method="post" action="{{ route('admin.dataSource.store') }}">
            @csrf
            <div class="form-group">
                <label for="source">Источник</label>
                <input type="text" id="source" name="source" value="{{ old('source') }}" class="form-control @error('source') is-invalid @enderror">
            </div>
            <div class="form-group">
                <label for="url">Ссылка</label>
                <textarea class="form-control" @error('url') is-invalid @enderror id="url" name="url">{!! old('url') !!}</textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
        </form>
    </div>
@endsection
