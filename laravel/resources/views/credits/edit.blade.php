@extends('layout')
@section('content')
<h3 class="text-bold">Buy creunits</h3>
<div class="divider" data-content="Buy creunits"></div>
<div class="columns">
    <div class="panel column col-auto col-mr-auto">
        <div class="panel-header d-inline-flex">
            <i class="icon icon-3x text-success mr-2" data-feather="package"></i>
            <h3 class="text-success">
                {{ $user->credit_amount }}
            </h3>
        </div>
        <form method="post" action="{{ route('credits.update', $user->id)}}" class="panel-footer">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label class="form-label">Amount</label>
                <input class="form-input" name="creditAmount" type="number" value="{{ $user->credit_amount }}">
            </div>
            <div class="form-group">
                <div class="btn-group btn-group-block">
                    <button class="btn btn-primary" type="submit">Buy</button>
                </div>
            </div>
        </form>
    </div>
    @endsection