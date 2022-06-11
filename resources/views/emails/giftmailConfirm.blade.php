@component('mail::message')
# Hello {{ $data['name'] }},

We gifted you {{ $data['gift'] }} $

Note: After doing 100$ transaction, you can use that gift.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
