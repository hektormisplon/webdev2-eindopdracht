@extends('layout')
@section('content')
<h1>{{$pledge->project->title}}</h1>
<h1>{{ $pledge->pledged/$pledge->goal *100 }}% funded</h1>
@endsection