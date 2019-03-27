@component('mail::message')
# Thank you for purchasing passes for the event {{ $event->name }} from MyEventino!

The invoice reciept for the passes is attached here in the mail.Show this receipt on the desk near the event entrace to collect passes!

@component('mail::button', ['url' => 'http://myeventino.dev'])
Visit MyEventino
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
