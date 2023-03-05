@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Изменить выгрузку данных</h1>
        <div class="btn-toolbar mb-2 mb-md-0"></div>
    </div>

    <div>
        @if ($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif

        <form method="post" action="{{ route('admin.orderForm.update', ['orderForm' => $orderForm]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="user">ФИО пользователя</label>
                <input type="text" id="user" name="user" value="{{ $orderForm->user }}" class="form-control @error('user') is-invalid @enderror">
            </div>
            <div class="form-group">
                <label for="phone">Номер телефона</label>
                <input type="number" id="phone" name="phone" value="{{ $orderForm->phone }}" class="form-control @error('phone') is-invalid @enderror">
            </div>
            <div class="form-group">
                <label for="email">Электронный адрес</label>
                <input type="email" id="email" name="email" value="{{ $orderForm->email }}" class="form-control @error('email') is-invalid @enderror">
            </div>
            <div class="form-group">
                <label for="criteria">Критерии выгрузки данных</label>
                <input type="text" id="criteria" name="criteria" value="{{ $orderForm->criteria }}" class="form-control @error('criteria') is-invalid @enderror">
            </div>
            <br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection

