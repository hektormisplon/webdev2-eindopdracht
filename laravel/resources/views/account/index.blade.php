@section('title', 'Create project')
@extends('layout')
@section('content')
<h3 class="text-bold">Accounts overview</h3>
@foreach($users as $user)
<div class="tile tile-centered">
    <p>{{ $user->email }}</p>
</div>
@endforeach
<div class="div">
    {{ $users->links() }}
</div>
@endsection