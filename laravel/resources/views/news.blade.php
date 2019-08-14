@extends('layout')
@section('title', 'What\'s new?')
@section('content')
<h3 class="text-bold">News</h3>
<div class="divider" data-content="Latest news"></div>
<div class="article-container" style='height: 75vh'>
    @foreach ($news as $article)
    <div class="tile tile-centered">
        <div class="tile-content">
            <h6 class="card-title">{{ $article->title }}</h6>
            <em>{{ $article->author }}</em>
            <small class="text-gray float-right">{{ $article->created_at->format('M j Y | h:m:s') }}</small>
            <div class="divider"></div>
            <div class="card-subtitle">{{ $article->description }}</div>
            <div class="divider"> </div>
            <div class="btn-group">
                <a href="#" class="btn">Read</a>
                <!-- TODO: route('news/{id}') -->
            </div>
            <div class="btn-group float-right">
                <a class="btn btn-link"><i data-feather="heart"></i></a>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="div">
    {{ $news->links() }}
</div>
@endsection