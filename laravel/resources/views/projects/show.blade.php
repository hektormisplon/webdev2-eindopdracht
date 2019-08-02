@extends('layout')
@section('content')
<h1>{{$project->title}}</h1>
<a href="{{ route('projects.edit',$project->id)}}" class="btn btn-primary">Edit</a>
@endsection