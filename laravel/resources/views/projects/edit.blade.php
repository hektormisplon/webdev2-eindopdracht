@extends('layout')
@section('content')
<h3 class="text-bold">Edit project</h3>
@if ($errors->any())
@foreach ($errors->all() as $error)
<div class="toast toast-error">{{ $error }}</div>
@endforeach
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
  <div class="form-group">
      @csrf
      <label class="form-label" for="name">Category</label>
      <select class="form-select" name="category">
          @foreach($categories as $category)
          <option>{{ $category->name }}</option>
          @endforeach
      </select>
      @error('category')
      <div class="toast toast-error">{{ $message }}</div>
      @enderror
  </div>
  <div class="form-group">
    <label class="form-label" for="info">Info</label>
    <textarea type="text" class="form-input" name="info">{{ $project->info }}</textarea>
  </div>
  <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection