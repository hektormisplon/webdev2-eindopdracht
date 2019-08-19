@extends('layout')
@section('content')
@if(session('message'))
<div class="toast toast-success mb-2">
    {{ session('message') }}
</div>
@endif
<h3 class="text-bold">My creunits</h3>
@if($user->credit_amount > 0)
<div class="panel">
    <div class="panel-header">
        <i class="icon icon-3x text-success mr-2" data-feather="package"></i>
        <h3 class="text-success">
            {{ $user->credit_amount }}
        </h3>
    </div>
    <div class="panel-body">
        <h5>Latest funding</h5>
        <p>{{ $latestTransaction->credit_amount }} to {{ $projectTitle }} by {{ $projectOwner }}</p>
    </div>
    <div class="panel-footer">
        <a class="btn btn-primary" href="/stripe">
            <i class="icon" data-feather="dollar-sign"></i>
            Buy creunits
        </a>
        <a class="btn" href="/{{ Request::path() }}/pledge-history">
            View funding history
        </a>
    </div>
</div>
@else
<div class="empty">
    <div class="empty-icon"><i class="icon icon-3x" data-feather="meh"></i></div>
    <p class="empty-subtitle">You don't have any creunits at the moment.</p>
    <div class="empty-action">
        <a class="btn btn-primary" href="/stripe">
            <i class="icon" data-feather="dollar-sign"></i>
            Buy credits
        </a>
    </div>
</div>
@endif
@endsection