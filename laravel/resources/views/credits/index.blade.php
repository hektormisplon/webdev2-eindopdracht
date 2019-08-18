@extends('layout')
@section('content')
@if(session('message'))
<div class="toast toast-success mb-2">
    {{ session('message') }}
</div>
@endif
<h3 class="text-bold">My creunits</h3>

@if($user->credit_amount > 0)
<div class="panel column col-mr-auto">
    <table class="table">
        <thead>
            <tr>
                <th>Order</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <tr class="active">
                <td>10</td>
                <td>04/08/15</td>
            </tr>
        </tbody>
    </table>
</div>
</div>
@else
<div class="empty">
    <div class="empty-icon"><i class="icon icon-3x" data-feather="meh"></i></div>
    <p class="empty-subtitle">You don't have any creunits at the moment.</p>
</div>
@endif
<a class="btn btn-primary" href="/stripe">
    <i class="icon" data-feather="dollar-sign"></i>Buy creunits
</a>
@endsection