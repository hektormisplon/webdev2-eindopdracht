@extends('layout')
@section('content')
<h3 class="text-bold">Projects</h3>
<div class="divider pb-2" data-content="Projects overview"></div>
@if(count($projects) > 0)
@foreach($projects as $project)
<div class="tile">
    <div class="tile-icon">
        <div class="example-tile-icon mr-2">
            <a href="{{ route('projects.show',$project->id)}}">
                <i class="icon icon-2x" data-feather="eye"></i>
            </a>
        </div>
    </div>
    <div class="tile-content">
        <div class="d-flex">
            <div class="tile-title text-bold">{{$project->title}}</div>
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
    <h5 class="empty-title">You have no projects.</h5>
    <p class="empty-subtitle">Would you like to create a new project?</p>
    <div class="empty-action">
        <a class="btn btn-primary" href="/projects/create">Create project</a>
        <a class="btn btn-link" href="{{ url()->previous() }}">Go back</a>
    </div>
</div>
@endif
@endsection