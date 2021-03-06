@extends('layout')
@section('content')
<h3 class="text-bold">Projects</h3>
<div class="divider pb-2" data-content="Projects overview"></div>

@if(count($projects) > 0)
<div class="btn-group btn-group-block">
    <a href="/discover" class="btn">all</a>

    @foreach($categories as $category)
        <a href="/discover/{{ $category->name }}" class="btn">{{ $category->name }}</a>
    @endforeach
</div>
@foreach($projects as $project)
<div class="tile tile-centered">
    <div class="tile-content">
        <div class="d-flex">
            <div class="tile-title text-bold"><a href="/discover/details/{{$project->id}}">{{$project->title}}</a></div>
            <div class="divider-vert"></div>
            <small class="tile-subtitle text-gray">{{$project->created_at->format('M j Y | g:i')}}</small>
        </div>
        <meter
            class="meter meter-sm" low="{{ $project->goal / 4 }}" 
            high="{{ $project->goal / 2 }}" 
            optimum="{{ $project->goal }}" 
            value="{{ $project->pledged }}" 
            min="0" 
            max="{{ $project->goal }}">
        </meter>
        <p class="tile-subtitle mt-2">{{ $project->description }}</p>
    </div>
    <div class="tile-action">
        <button class="btn btn-link">
            <i class="icon icon-more-vert"></i>
        </button>
    </div>
</div>
@endforeach
@else
<div class="empty">
    <h5 class="empty-title">Please check again later</h5>
    <p class="empty-subtitle">We could not load any projects at this time.</p>
    <div class="empty-action">
        <a class="btn btn-primary" href="/news">See news</a>
    </div>
</div>
@endif
@endsection