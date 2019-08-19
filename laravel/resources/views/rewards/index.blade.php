@extends('layout')
@section('content')
<h3 class="text-bold">
    My rewards
</h3>
@foreach($rewards as $reward)
<figure class="avatar avatar-lg badge" data-badge="8" data-initial="{{ $reward->tier }}">
</figure>
@endforeach
@endsection