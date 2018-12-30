@component('mail::message')
# Account activation

Please activate your acccount

@component('mail::button', ['url' => route('activation.activate', $token)])
Activate
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
