@component('mail::message')
# Hi, {{$staff->first_name}} {{$staff->last_name}}

Welcome to Kaipara security and property management company, thank you for joining us.

@component('mail::panel')
    The email address you are using is {{$staff->email}}.
@endcomponent

@component('mail::button', ['url' => route('staff.password.request')])
Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
