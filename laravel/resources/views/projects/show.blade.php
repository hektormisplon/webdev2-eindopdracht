@extends('layout')
@section('content')
<h1>{{$project->title}}</h1>
<a href="{{ route('projects.edit',$project->id)}}" class="btn btn-primary">Edit</a>
@if ($project->pledge)
<h1>{{ $project->pledge->pledged/$project->pledge->goal *100 }}% funded</h1>
<form method="post" action="/pledges/{{ $project->pledge->id }}">
    @method('PATCH')
    @csrf
    <input class="form-input" type="number" name="pledged">
    <button class="btn btn-primary" type="submit">Fund</button>
</form>
@endif
@endsection