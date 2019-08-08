@extends('layout')
@section('content')
<h3>My credits</h3>
<a href="{{ route('credits.edit', $user->id) }}">Buy credits</a>
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