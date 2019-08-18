@extends('layout')
@section('content')
@if(session('message'))
<div class="toast toast-success mb-2">
    {{ session('message') }}
</div>
@endif
<h3 class="text-bold">My creunits</h3>
<a href="{{ route('credits.edit', $user->id) }}">Buy creunits</a>
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
@endsection