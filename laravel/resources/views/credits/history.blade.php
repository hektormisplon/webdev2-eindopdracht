@extends('layout')
@section('content')
<h3 class="text-bold">Funding history</h3>
<div class="panel">
    <table class="table">
        <thead>
            <tr>
                <th>Order amount</th>
                <th>Date</th>
                <th>Project title</th>
                <th>Project owner</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)                
            <tr>
                <td>{{ $transaction->credit_amount }}</td>
                <td>{{ $transaction->created_at->format('d/m/Y') }}</td>
                <td>{{ $transaction->project->title }}</td>
                <td>{{ $transaction->owner->name() }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection