@section('title', 'Create project')
@extends('layout')
@section('content')
<h3>New project</h3>
<div class="divider" data-content="Publish a new project"></div>
<form method="post" action="{{ route('projects.store') }}">
    <div class="form-group">
        @csrf
        <label class="form-label" for="name">Title</label>
        <input type="text" class="form-input @error('title') is-error @enderror" name="title" value="{{ old('title') }}" />
        @error('title')
        <div class="toast toast-error">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label class="form-label" for="descriptioon">Description</label>
        <input class="form-input @error('description') is-error @enderror" type="text" name="description" value="{{ old('description') }}" />
        @error('description')
        <div class="toast toast-error">{{ $message }}</div>
        @enderror
    </div>
    <!-- <div class="form-group">
        <label class="form-label" for="goal">Pledge goal</label>
        <input class="form-input @error('goal') is-error @enderror" type="number" name="goal" value="{{ old('goal') }}" />
        @error('goal')
        <div class="toast toast-error">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label class="form-label" for="deadline">Deadline</label>
        <input class="form-input @error('deadline') is-error @enderror" type="date" name="deadline" value="{{ old('deadline') }}" />
        @error('deadline')
        <div class="toast toast-error">{{ $message }}</div>
        @enderror
    </div> -->
    <button type="submit" class="btn btn-primary">Publish</button>
</form>
@endsection