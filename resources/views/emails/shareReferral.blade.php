@component('mail::message')
# Hello,

{{ $arr['name'] }} has shared his referral link with you. Register now to get bonus credits.

To register please hit the button below.

@component('mail::button', ['url' => $arr['url']])
Register Now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent