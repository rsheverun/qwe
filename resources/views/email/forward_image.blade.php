@component('mail::message')

{{$data->text}}
@component('mail::button', ['url' => $url])
Click Here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
