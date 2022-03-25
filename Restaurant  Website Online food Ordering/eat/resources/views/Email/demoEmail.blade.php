@component('mail::message')
# {{ $mailData['title'] }}

    {{ $mailData['body'] }}

@component('mail::button', ['url' => $mailData['url']])
Sosa Santa
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent