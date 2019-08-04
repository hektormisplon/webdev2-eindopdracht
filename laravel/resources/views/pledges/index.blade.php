@extends('layout')
@section('content')
@if(count($pledges) > 0)
    @foreach($pledges as $pledge)
    <div class="card">
        <div class="card-header">  
            <h3 class="card-title">{{ $pledge->pledged / $pledge->goal *100 }}% of goal reached</h3>
        </div>
        <div class="card-body">
            <p class="card-subtitle text-gray">{{ $pledge->project->title }}</p>
            <p class="card-subtitle text-gray">{{$pledge->id}}</p>
            <p>Pledged on {{$pledge->created_at->format("F j, Y, g:i a")}}</p>
        </div>
    </div>
    @endforeach
@endif
@endsection