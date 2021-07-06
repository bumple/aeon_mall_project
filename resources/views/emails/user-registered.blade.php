@component('mail::message')
# {{ $details['title'] }}

This is email from Boutique Brothers.

@component('mail::button', ['url' => $details['url']])
Thank you so much!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
