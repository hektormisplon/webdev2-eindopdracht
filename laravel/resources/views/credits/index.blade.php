@extends('layout')
@section('content')
<h3>My creunits</h3>
<div class="divider" data-content="Buy creunits"></div>
<div class="columns">
    <div class="panel column col-auto col-mr-auto">
        <div class="panel-header d-inline-flex">
            <i class="icon icon-3x text-success mr-2" data-feather="package"></i>
            <h3 class="text-success">
                {{ $user->credit_amount }}
            </h3>
        </div>
        <form action="{{ route('credits.update', $user->id ) }}" class="panel-footer">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label class="form-label" for="amount">Amount</label>
                <input class="form-input" name="credit_amount" type="number">
            </div>
            <div class="form-group">
                <div class="btn-group btn-group-block">
                    <button class="btn btn-primary" type="submit">Buy</button>
                </div>
            </div>
        </form>
    </div>
    <div class="divider-vert"></div>
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
<div class="divider" data-content="My transactions"></div>
@endsection