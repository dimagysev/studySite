@component('mail::message')

Email отправителя: {{ $email }}<br/>
Имя отправителя: {{ $name }}<br/>
<hr/>

{{ $message }}

@endcomponent

