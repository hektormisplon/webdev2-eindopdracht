@section('title', 'Create project')
@extends('layout')
@section('content')
<h3>New project</h3>
<div class="divider" data-content="Pledge details"></div>
<form method="post" action="{{ route('projects.store') }}">
    <div class="form-group">
        @csrf
        <label class="form-label" for="name">Pledge goal</label>
        <div class="input-group">
            <span class="input-group-addon">
                <i class="icon icon-3x text-secondary" data-feather="package"></i>
            </span>
            <input type="number" placeholder="0" class="form-input input-primary @error('goal') is-error @enderror" name="goal" value="{{ old('goal') }}" />
            @error('goal')
            <div class="toast toast-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-group">
        @csrf
        <label class="form-label" for="name">Deadline</label>
        <input type="date" class="form-input @error('goal') is-error @enderror" name="deadline" value="{{ old('deadline') }}" />
        @error('deadline')
        <div class="toast toast-error">{{ $message }}</div>
        @enderror
    </div>
    <div class="divider" data-content="Project details"></div>
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
    <div class="form-group">
        @csrf
        <label class="form-label" for="name">Category</label>
        <select class="form-select">
            <option></option>
            <option>Category 1</option>
            <option>Category 2</option>
            <option>Category 3</option>
        </select>
        @error('category')
        <div class="toast toast-error">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        @csrf
        <label class="form-label" for="info">Info</label>
        <textarea class="form-input @error('info') is-error @enderror" name="info" rows="3" maxlength="500" value="{{ old('info') }}"></textarea>
        @error('info')
        <div class="toast toast-error">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Publish</button>
</form>
@endsection