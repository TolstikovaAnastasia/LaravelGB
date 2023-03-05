@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Обратная связь</h1>
        <div class="btn-toolbar mb-2 mb-md-0"></div>
    </div>

    <div class="container">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif
        <form method="post" action="{{ route('admin.feedback.store') }}">
            @csrf
            <div class="form-group">
                <label for="user">Пользователь</label>
                <input type="text" id="user" name="user" value="{{ old('user') }}" class="form-control @error('user') is-invalid @enderror">
            </div>
            <br>
            <div class="form-group">
                <label for="comment">Комментарий</label>
                <input type="text" id="comment" name="comment" value="{{ old('feedback') }}" class="form-control @error('feedback') is-invalid @enderror">
            </div>
            <br>
            <button type="submit" class="btn btn-success button-blue">Отправить</button>
        </form>
    </div>
@endsection
