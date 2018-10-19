@component('mail::message')
# Hello {{$user->first_name}} {{$user->last_name}}, 
Your username is: {{$user->nickname}} <br>
Your password is: {{$password}} <br>
Please confirm your e-mail address

@component('mail::button', ['url' =>  route('email-verification.check', $user->verification_token) . '?email=' . urlencode($user->email) ])
follow
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent