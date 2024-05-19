<x-mail::message>
# {{__('emails.welcome_in_app')}}
{{__('emails.glade_to_see_you')}}
<x-mail::panel>
{{__('emails.your_code')}}
{{$code}}
</x-mail::panel>

{{__('emails.thanks')}},<br>
{{ config('app.name') }}
</x-mail::message>
