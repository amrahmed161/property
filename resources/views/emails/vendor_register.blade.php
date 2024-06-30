@component('mail::message')
Hi {{ $user->name }},<br>
Your Email Id: {{ $user->email }},<br>

<p>Thanks for joining {{ config('app.name')}}.</p>
<p>Cick on button bellow, to Validate your email address.</p>
@component(@method('mail:button', ['url' => url('vendor/password/'.$user->forgot_token)]
))
login
@endcomponent
Thanks,<br>
Property Management Services
@endcomponent
