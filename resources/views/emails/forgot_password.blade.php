@component('mail::message')

Hi,{{$user->name}}. Forget Your Password?

<p>Its happens. Click the link below to reset your password</p>

     @component('mail::button',['url'=>url('reset/' .$user->remember_token)])

     @endcomponent

     ! in case you have any issue recovering your passcode,please contact us using the form from contact-as page
     Thanks,<br>

     {{config('app.name')}}

@endcomponent