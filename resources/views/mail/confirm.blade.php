@component('mail::message')
## Welcome to  {{ config('app.name') }}, {{$user->name}}

*Kindly Confirm Your Email*

@component('mail::button', ['url' => 'laravel.dev'])
Confirm Mail
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
