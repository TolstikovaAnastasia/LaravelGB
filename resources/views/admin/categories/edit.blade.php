@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Change category</h1>
        <div class="btn-toolbar mb-2 mb-md-0"></div>
    </div>
    <div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif
        <form method="post" action="{{ route('admin.categories.update', ['categories' => $categories]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="news_ids">News</label>
                <select class="form-control" name="news_ids[]" id="news_ids" multiple>
                    <option value="0">--Choose--</option>
                    @foreach($news as $new)
                        <option @if(in_array($new->id, $categories->news->pluck('id')->toArray())) selected @endif value="{{ $new->id }}">{{ $new->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" value="{{ $categories->title }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description">{{ $categories->description }}</textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
@endsection


