@extends('layout')
@section('content')
<div class="panel">
    <div class="panel-header text-center">
        <figure class="avatar avatar-xl"> <img src="/storage/avatars/{{ $user->avatar }}" /></figure>
        @if ($user->name)
        <div class="panel-title h5 mt-10">{{ $user->name }}</div>
        @endif
        <div class="panel-subtitle">User settings</div>
    </div>
    <div class="divider text-center" data-content="Account"></div>
    <div class="panel-body">
        <div class="tile tile-centered">
            <div class="tile-content">
                <div class="tile-title text-bold">Email</div>
                <div class="tile-subtitle">{{ $user->email }}</div>
            </div>
            <div class="tile-action">
                <button class="btn btn-link btn-action btn-lg tooltip tooltip-left" data-tooltip="Edit E-mail"><i class="icon icon-edit"></i></button>
            </div>
        </div>
        <form id="personal-settings" action="{{ route('profile.update', $user->id) }}" method="post" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <input class="form-input" type="file" name="avatar">
                <small>Please upload a valid image file. Max. 2MB.</small>
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input class="form-input" type="email" name="email" value="{{ $user->email }}">
            </div>
        </form>
    </div>
    <div class="panel-footer">
        <button type="submit" form="personal-settings" class="btn btn-primary btn-block">Save profile</button>
    </div>
</div>


@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@endsection