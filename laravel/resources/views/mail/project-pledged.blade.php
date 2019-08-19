@component('mail::message')
# Your received some creunits | {{ $transaction->title }}

{{ $transaction->amount }}

@component('mail::button', ['url' => url("/home")])
View project
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
