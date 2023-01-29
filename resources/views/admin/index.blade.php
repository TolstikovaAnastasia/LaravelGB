@extends('layouts.admin')
@section('title') AdminPanel @parent @stop
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Admin</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Share</button>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        @include('inc.info', ['status' => 'complete'])
        <x-alert type="info" message="It is information message"></x-alert>
        <x-alert type="danger" message="It is information message"></x-alert>
        <x-alert type="warning" message="It is information message"></x-alert>
        <x-alert type="success" message="It is information message"></x-alert>
    </div>
@endsection
