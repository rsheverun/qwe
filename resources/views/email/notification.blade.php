@component('mail::message')
# Introduction

You have a new photos from camera

@component('mail::button', ['url' => $url ])
Click here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
