@extends('layout')
@section('content')
<div class="card">
    <div class="card-header">
        <h3>
            @if(auth()->user()->isAdmin())
            <i class="icon icon-3x" data-feather="zap"></i>
            @endif
            {{ auth()->user()->email }}
        </h3>
    </div>
    <div class="card-body">
    </div>
</div>
@endsection