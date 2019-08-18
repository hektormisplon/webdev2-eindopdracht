@extends('layout')
@section('title', 'What\'s new?')
@section('content')
<h3 class="text-bold">News</h3>
<a href="{{ url()->previous() }}">Back</a>
<div class="divider" data-content="Latest news"></div>
<div class="article-container" style='height: 66vh; overflow-y: auto'>
    <h3>{{ $article->title }}</h3>
    <h5>{{ $article->description }}</h5>
    <p>{{ $article->body }}</p>
</div>
@endsection