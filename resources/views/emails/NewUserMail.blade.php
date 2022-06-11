@component('mail::message')
# Hello Admin,

A new user registered in your website.

### Name: {{ $arr['name'] }}
### Email: {{ $arr['email'] }}

To check that user info and reward him/her please hit the button below.

@component('mail::button', ['url' => $arr['url']])
Check User
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
