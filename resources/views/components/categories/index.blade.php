@extends('layouts.main')
@section('content')
    <div class="row mb-2">
@foreach ($categoriesList as $category)
    <div class="col-md-6">
        <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
                <strong class="d-inline-block mb-2 text-success">{{ $category->author }}</strong>
                <h3 class="mb-0">
                    <a class="text-dark" href="{{ route('categories.show', ['category_id' => $category->id]) }}">{{ $category->title }}</a>
                </h3>
                <div class="mb-1 text-muted">{{ $category->created_at }}</div>
                <p class="card-text mb-auto">{!! $category->description !!}</p>
                <a href="{{ route('categories.show', ['category_id' => $category->id]) }}">Читать далее</a>
                <a href="{{ route('news') }}">Показать новости</a>
            </div>
            <svg class="card-img-right flex-auto d-none d-md-block" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="32%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
        </div>
    </div>
@endforeach
@endsection
