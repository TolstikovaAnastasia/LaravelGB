@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Order Form</h1>
        <div class="btn-toolbar mb-2 mb-md-0"></div>
    </div>

    <div class="container">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif
        <form method="post" action=" {{ route('admin.orderForm.store') }}">
            @csrf
            <div class="form-group">
                <label for="user">User name</label>
                <input type="text" id="user" name="user" value="{{ old('user') }}" class="form-control">
            </div>
            <br>
            <div class="form-group">
                <label for="phone">Phone number</label>
                <input type="number" id="phone" name="phone" value="{{ old('phone') }}" class="form-control">
            </div>
            <br>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="text" id="email" name="email" value="{{ old('email') }}" class="form-control">
            </div>
            <br>
            <div class="form-group">
                <label for="criteria">Criteria of search</label>
                <input type="text" id="criteria" name="criteria" value="{{ old('criteria') }}" class="form-control">
            </div>
            <br>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
@endsection
