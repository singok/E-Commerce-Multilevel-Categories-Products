@component('mail::message')
# Password Reset

Click on the button to update you password.

@component('mail::button', ['url' => 'http://127.0.0.1:8000/password/update/'.$email.'/'.$token])
Click Here
@endcomponent

Thanks,<br>
{{ config('app.name') }}    
@endcomponent
