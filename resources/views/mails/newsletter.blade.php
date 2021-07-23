@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => 'https://aorbooks.net'])
Browse Books
@endcomponent

Thanks, {{ $firstName }}<br>
{{ config('app.name') }}
@endcomponent
