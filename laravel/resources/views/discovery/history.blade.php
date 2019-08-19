@extends('layout')
@section('content')
<h3 class="text-bold">Pledge history</h3>
<a class="btn mb-2" href="{{ url()->previous() }}">
    <i class="icon icon-1x" data-feather="arrow-left"></i>
    Back
</a>
<div class="panel">
    <table class="table">
        <thead>
            <tr>
                <th>Order amount</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)                
            <tr class="active">
                <td>{{ $transaction->credit_amount }}</td>
                <td>{{ $transaction->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection