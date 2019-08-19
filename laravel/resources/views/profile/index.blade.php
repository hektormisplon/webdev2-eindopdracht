@extends('layout')
@section('content')
<h3 class="text-bold">Profile</h3>
<div class="panel">
    <div class="panel-header text-center">
        <figure class="avatar avatar-xl"> <img src="/storage/avatars/{{ $user->avatar }}" /></figure>
        <div class="panel-title h5 mt-10">{{ $user->name() }}</div>
    </div>
    <div class="divider text-center" data-content="Account"></div>
    <div class="panel-body">
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