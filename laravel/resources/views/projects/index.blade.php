@extends('layout')
@section('content')
@if(count($projects) > 0)
    @foreach($projects as $project)
    <div class="card">
        @if ($project->img)
        <div class="card-image">
            <img src="" class="img-responsive">
        </div>
        @endif
        <div class="card-header">  
            <h3 class="card-title">{{$project->title}}</h3>
            <p class="card-subtitle text-gray">{{$project->id}}</p>
            <p>{{$project->created_at}}</p>
            <p>{{$project->updated_at}}</p>
        </div>
        <div class="card-body">
            <p>{{$project->description}}</p>
        </div>
        <div class="card-footer">
            <div class="btn-group btn-group-block">
                <a class="btn btn-primary" href="{{ route('projects.show',$project->id)}}">Details</a>
                <a class="btn btn" href="{{ route('projects.edit',$project->id)}}">Edit</a>
                <form action="{{ route('projects.destroy', $project->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
@else
<div class="empty">
    <h3 class="empty-title">You do not have any projects yet.</h3>
    <p class="empty-subtitle">Would you like to create a new project?</p>
    <div class="empty-action">
        <a class="btn btn-primary" href="/projects/create">Create project</a>
        <button class="btn btn-link">Go back</button>
    </div>
</div>
@endif
@endsection