<x-mail::message>
# {{__('emails.welcome_in_app')}}
<x-mail::panel>
{{__('emails.reset_password_code')}}
{{$code}}
</x-mail::panel>

{{__('emails.thanks')}},<br>
{{ config('app.name') }}
</x-mail::message>
