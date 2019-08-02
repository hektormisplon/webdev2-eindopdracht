@extends('layout')
@section('content')
<div class="card uper">
<h1>Edit project</h1>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
      <form method="post" action="{{ route('projects.update', $project->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label class="form-label" for="title">Title</label>
          <input type="text" class="form-input" name="title" value="{{ $project->title }}">
        </div>
        <div class="form-group">
          <label class="form-label" for="description">Description</label>
          <textarea type="text" class="form-input" name="description">{{ $project->description }}</textarea> 
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
      </form>
@endsection