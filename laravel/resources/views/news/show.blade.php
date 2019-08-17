@extends('layout')
@section('title', 'What\'s new?')
@section('content')
<h3 class="text-bold">News</h3>
<div class="divider" data-content="Latest news"></div>
<div class="article-container" style='height: 75vh'>
    <h3>{{ $article->title }}</h3>
    <h5>{{ $article->description }}</h5>
    <p>{{ $article->body }}</p>
</div>
@endsection