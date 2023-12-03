@component('mail::message')
# Password Reset Request

Dear {{$user->name}},

We received a request to reset your password. If you did not make this request, please ignore this email. Otherwise, you can reset your password using the button below.

@component('mail::button', ['url' => url('reset/' . $user->remember_token)])
Reset Password
@endcomponent

If you're having trouble clicking the "Reset Password" button, copy and paste the URL below into your web browser: {{url('reset/' . $user->remember_token)}}

If you need further assistance, please contact our support team.

Best Regards,

{{ config('app.name') }}
@endcomponent
