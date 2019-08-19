@extends('layout')
@section('title', 'What\'s new?')
@section('content')
<h3 class="text-bold">News</h3>
<a class="btn mb-4" href="{{ url()->previous() }}">
    <i class="icon icon-1x" data-feather="arrow-left"></i>
    Back
</a>
<div class="divider" data-content="Latest news"></div>
<div class="article-container">
    <h3>{{ $article->title }}</h3>
    <h5>{{ $article->description }}</h5>
    <p>{{ $article->body }}</p>
</div>
@endsection