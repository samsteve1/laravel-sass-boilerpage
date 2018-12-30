@component('mail::message')
# Password Updated

We just want to let you know that your password has been updated.

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
