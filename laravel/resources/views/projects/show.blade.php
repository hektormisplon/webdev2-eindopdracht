@extends('layout')
@section('content')
@if(session('message'))
<div class="toast toast-success mb-2">
    {{ session('message') }}
</div>
@endif
@if ($project->img)
<div class="card-image">
    <img src="" class="img-responsive">
</div>
@endif
<div class="card-header">
    <h3 class="card-title">{{$project->title}}</h3>
    <p class="card-subtitle text-gray">{{$project->description}}</p>
    <p class="float-left">{{$project->created_at->format('d M y')}}</p>
    <p class="float-right">{{ $project->deadline }}</p>
    @if($project->pledge)
    <meter class="meter" low="{{ $project->pledge->goal / 4 }}" high="{{ $project->pledge->goal / 2 }}" optimum="{{ $project->pledge->goal }}" value="{{ $project->pledge->pledged }}" min="0" max="{{ $project->pledge->goal }}"></meter>
    <small>{{ $project->pledge->pledged/$project->pledge->goal *100 }}% funded</small>
    @endif
</div>
@if ($project->pledge)
<form method="post" action="/pledges/{{ $project->pledge->id }}">
    @method('PATCH')
    @csrf
    <div class="input-group">
        <input class="form-input" type="number" name="pledged">
        <button class="btn btn-primary" type="submit">Fund</button>
    </div>
</form>
@endif
<div class="btn-group btn-group-block">
    <a class="btn btn" href="{{ route('projects.edit',$project->id)}}">Edit</a>
    <form action="{{ route('projects.destroy', $project->id)}}" method="post">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" type="submit">Delete</button>
    </form>
</div>
<div class="mt-2 panel">
    <div class="panel-header">
        <div class="panel-title">Comments</div>
    </div>
    <div class="panel-body">
        @foreach($project->comments as $comment)
        <div class="tile">
            <div class="tile-icon tooltip tooltip-right" data-tooltip="{{ $comment->created_at->format("M j Y | g:i") }}">
                <div class="example-tile-icon">
                    <figure class="avatar avatar-md"> <img src="/storage/avatars/{{ $comment->sender->avatar }}" /></figure>
                </div>
            </div>
            <div class="tile-content">
                <p class="tile-title text-bold">{{ $comment->sender->email }}</p>
                <p class="tile-subtitle">{{ $comment->message}}</p>
            </div>
        </div>
        @endforeach
    </div>
    <div class="panel-footer">
        <div class="input-group">
            <input class="form-input" type="text" placeholder="Leave a comment...">
            <button class="btn btn-primary input-group-btn">Send</button>
        </div>
    </div>
    @endsection